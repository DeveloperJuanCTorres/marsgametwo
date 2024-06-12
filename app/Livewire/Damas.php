<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On; 

class Damas extends Component
{
    public $game, $adversary,$userAdversary;
    public $chat;
    public $users;
    public $bodyMessage;
    public $draughts;
    public $player;
    public $myColor;

    public $contact_id;

    public function mount(Game $game){
        $this->game = $game;
        $this->userAdversary = $game->userAdversary; //obtengo el adversarion con un mutador que programe en el modelo
        $this->adversary = $game->users->where('id', '!=', auth()->id())->first();
        $this->users = collect(); //se inicializa los usuario en una coleccion para usarce despues en ECHO
        $this->chat = $this->game->messages()->get();
        //-------------Obtener el color que se asignó------
        $myUser = $this->game->myUser;
        $this->myColor = $myUser->pivot->color;
        //----------------------
        $this->InitBoard();
    }

    //se inicializa el table con el color en turno
    public function InitBoard(){
        $draughtsInitial = [
            [' ','b',' ','b',' ','b',' ','b'],
            ['b',' ','b',' ','b',' ','b',' '],
            [' ','b',' ','b',' ','b',' ','b'],
            [' ',' ',' ',' ',' ',' ',' ',' '],
            [' ',' ',' ',' ',' ',' ',' ',' '],
            ['w',' ','w',' ','w',' ','w',' '],
            [' ','w',' ','w',' ','w',' ','w'],
            ['w',' ','w',' ','w',' ','w',' ']];
        //consulto el ultimo movimiento para dibujar el tablero si no hay moviemeos agrego el tablero inicial
        $stringMove = $this->game->moves()->get()->last()?? [];
        if($stringMove) {
            $this->draughts = json_decode($stringMove->move);
            $this->player =  $stringMove->color;
        } else{
            // $myUser = $this->game->myUser;
            //$this->player = $myUser->pivot->color; //obtengo el color que le corresponde en la tabla pivot
            $this->player = 'W';
            $this->draughts = $draughtsInitial;
        }
    }

    #[On('move')] 
    public function move($move,$color){
        $now = date('H:i:s');
        $jsonString = json_encode($move);
        $this->game->moves()->create([
            'user_id'=> auth()->user()->id,
            'move'=>$jsonString,
            'color'=>$color,
            'timer_end'=>$now,
        ]);
        // $this->reset('bodyMessage');
        Notification::send($this->userAdversary, new \App\Notifications\NewMove());  
    }

    //Oyentes
    public function getListeners()
    {
        $user_id = auth()->user()->id;
        return [
            "echo-notification:App.Models.User.{$user_id},notification" => 'render',
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
        return $this->users->contains($this->userAdversary->id);
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
        
        Notification::send($this->userAdversary, new \App\Notifications\NewMessage());
        $this->reset('bodyMessage');
    }

    //
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

    public function render()
    {
        $this->InitBoard();
        $this->dispatch('notificateEchoJs',$this->draughts, $this->player,$this->myColor);
        //$this->dispatch('notificateEchoJs');
        return view('livewire.damas')->layout('layouts.damas');
    }
}