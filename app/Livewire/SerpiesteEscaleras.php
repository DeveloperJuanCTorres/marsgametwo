<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On; 

class SerpiesteEscaleras extends Component
{

    public $game, $adversary,$contact_id;
    public $chat;
    public $users;
    public $bodyMessage;

    public $draughts;
    public $player;
    public $jump;

    public $userAdversary;

    public function mount(Game $game){
        $this->game = $game;
        $this->userAdversary = $game->userAdversary; 

        $this->adversary = $game->users->where('id', '!=', auth()->id())->first();
        $this->users = collect();
        $this->chat = $this->game->messages()->get();
        // $this->dispatch('playgame');
        $this->InitBoard();
    }

    public function InitBoard(){
        $draughtsInitial = '[{"name":"Your Turn","win":"You Win!","position":5,"element":[[[]]],"color":"cyan"},{"name":"Computer","win":"Computer Wins!","position":8,"element":[[[]]],"color":"red"}]';
        //consulto el ultimo movimiento para dibujar el tablero si no hay moviemeos agrego el tablero inicial
        $stringMove = $this->game->moves()->get()->last()?? [];
        if($stringMove) {
            $this->draughts = json_decode($stringMove->move);
            $this->player =  $stringMove->position;
            $this->jump =  $stringMove->jump;
        } else{
            // $myUser = $this->game->myUser;
            //$this->player = $myUser->pivot->color; //obtengo el color que le corresponde en la tabla pivot
            $this->player = 1;
            $this->draughts = json_decode($draughtsInitial);
            $this->jump = 0;
        }
    }

    #[On('move')] 
    public function move($move,$position,$jump){
        $now = date('H:i:s');
        $jsonString = json_encode($move);
        $this->game->moves()->create([
            'user_id'=> auth()->user()->id,
            'move'=>$jsonString,
            'color'=>'',
            'position'=>$position,
            'jump'=>$jump,
            'timer_end'=>$now,
        ]);
        Notification::send($this->userAdversary, new \App\Notifications\NewMove());
    }

    //Oyentes
    public function getListeners()
    {
        $user_id = auth()->user()->id;

        return [
            "echo-notification:App.Models.User.{$user_id},notification" => 'playGame',
            "echo-presence:chat.1,here" => 'chatHere',
            "echo-presence:chat.1,joining" => 'chatJoining',
            "echo-presence:chat.1,leaving" => 'chatLeaving',
        ];
    }
    //Propiedad computadas
    public function getMessagesProperty(){
        return $this->chat ? $this->game->messages()->get(): [];
    }
    public function getActiveProperty(){
        return $this->users->contains($this->adversary->id);
    }

    //Métodos
    public function sendMessage(){
        $this->validate([
            'bodyMessage' => 'required'
        ]);

        $this->game->messages()->create([
            'body' => $this->bodyMessage,
            'user_id' => auth()->user()->id
        ]);
        
        Notification::send($this->adversary, new \App\Notifications\NewMessage());
        $this->reset('bodyMessage');
        // $this->dispatch('scrollIntoView');
    }

    public function chatHere($users){
        $this->users = collect($users)->pluck('id');
    }

    public function chatJoining($user){
        $this->users->push($user['id']);
    }

    public function chatLeaving($user){
        $this->users = $this->users->filter(function($id) use ($user){
            return $id != $user['id'];
        }); 
    }

    //Game
    // public function play(){
    //     $pop = rand(1,6);
    //     $this->dispatch('dados',pop: $pop);
    // }

    public function playGame(){
        $this->InitBoard();
        $this->dispatch('notificateEchoJs',$this->draughts, $this->player,$this->jump);
    }
    
    public function render()
    {
        // $this->dispatch('scrollIntoView');
        //$this->dispatch('notificateEchoJs',$this->draughts, $this->player,$this->jump);
        return view('livewire.serpieste-escaleras')->layout('layouts.serpientes');
    }
}
