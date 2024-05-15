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
    public $myPosition;

    public $userAdversary;

    public function mount(Game $game){
        $this->game = $game;
        $this->userAdversary = $game->userAdversary; 
        $this->adversary = $game->users->where('id', '!=', auth()->id())->first();
        $this->users = collect();
        $this->chat = $this->game->messages()->get();

        $myUser = $this->game->myUser;
        switch ($myUser->pivot->color) {
            case 'cyan':
                $this->myPosition = 0;
            break;
            case 'red':
                $this->myPosition = 1;
            break;
            case 'green':
                $this->myPosition = 2;
            break;
            case 'blue':
                $this->myPosition = 3;
            break;
        }
        $this->InitBoard();
    }

    public function InitBoard(){
        $draughtsInitial = '[{"name":"Your Turn","win":"You Win!","position":0,"element":[[[]]],"color":"cyan"},{"name":"Computer","win":"Computer Wins!","position":0,"element":[[[]]],"color":"red"}]';
        //consulto el ultimo movimiento para dibujar el tablero si no hay moviemeos agrego el tablero inicial
        $stringMove = $this->game->moves()->get()->last()?? [];
        if($stringMove) {
            $this->draughts = json_decode($stringMove->move);
            $this->player =  $stringMove->position;
            $this->jump =  $stringMove->jump;
        } else{
            $this->player = 0;
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

    #[On('playGame')] 
    public function playGame(){
        $this->InitBoard();
        $this->dispatch('notificateEchoJs',$this->draughts, $this->player,$this->jump,$this->myPosition);
    }

    #[On('render')] 
    public function render()
    {
        if( $this->player <> $this->myPosition){
            $this->InitBoard();
            $this->dispatch('iniliziateJs',$this->player,$this->myPosition);
        }

        $this->dispatch('scrollIntoView');
        return view('livewire.serpieste-escaleras')->layout('layouts.serpientes');
    }
}
