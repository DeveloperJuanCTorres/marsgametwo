<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On; 

class Ajedrez extends Component
{
    public $game, $adversary,$contact_id;
    public $chat;
    public $users;
    public $bodyMessage;

    public $draughts;
    public $player;

    public function mount(Game $game){
        $this->game = $game;
        $this->adversary = $game->users->where('id', '!=', auth()->id())->first();
        $this->users = collect();
        $this->chat = $this->game->messages()->get();
        // $this->dispatch('playgame');
        $this->InitBoard();
    }

    public function InitBoard(){
        $draughtsInitial = '[{"name": "rook","line": "l1","square": "c1","figure": "♜","color": "white","state": 1},
            {"name": "knight","line": "l1","square": "c2","figure": "♞","color": "white","state": 1},
            {"name": "bishop","line": "l1","square": "c3","figure": "♝","color": "white","state": 1},
            {"name": "queen","line": "l1","square": "c4","figure": "♛","color": "white","state": 1},
            {"name": "king","line": "l1","square": "c5","figure": "♚","color": "white","state": 1},
            {"name": "bishop","line": "l1","square": "c6","figure": "♝","color": "white","state": 1},
            {"name": "knight","line": "l1","square": "c7","figure": "♞","color": "white","state": 1},
            {"name": "rook","line": "l1","square": "c8","figure": "♜","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c1","figure": "♙","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c2","figure": "♙","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c3","figure": "♙","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c4","figure": "♙","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c5","figure": "♙","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c6","figure": "♙","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c7","figure": "♙","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c8","figure": "♙","color": "white","state": 1},
            {"name": "pawn","line": "l7","square": "c1","figure": "♙","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c2","figure": "♙","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c3","figure": "♙","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c4","figure": "♙","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c5","figure": "♙","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c6","figure": "♙","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c7","figure": "♙","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c8","figure": "♙","color": "black","state": 1},
            {"name": "rook","line": "l8","square": "c1","figure": "♜","color": "black","state": 1},
            {"name": "knight","line": "l8","square": "c2","figure": "♞","color": "black","state": 1},
            {"name": "bishop","line": "l8","square": "c3","figure": "♝","color": "black","state": 1},
            {"name": "queen","line": "l8","square": "c4","figure": "♛","color": "black","state": 1},
            {"name": "king","line": "l8","square": "c5","figure": "♚","color": "black","state": 1},
            {"name": "bishop","line": "l8","square": "c6","figure": "♝","color": "black","state": 1},
            {"name": "knight","line": "l8","square": "c7","figure": "♞","color": "black","state": 1},
            {"name": "rook","line": "l8","square": "c8","figure": "♜","color": "black","state": 1}]';
        //consulto el ultimo movimiento para dibujar el tablero si no hay moviemeos agrego el tablero inicial
        $stringMove = $this->game->moves()->get()->last()?? [];
        if($stringMove) {
            $this->draughts = json_decode($stringMove->move);
            $this->player =  $stringMove->color;
        } else{
            $this->player = 'W';
            $this->draughts = json_decode($draughtsInitial);
        }
    }

    #[On('move')] 
    public function move($line,$square,$key){
        dd($line);
        // $now = date('H:i:s');
        // $this->game->moves()->create([
        //     'user_id'=> auth()->user()->id,
        //     'move'=>$move,
        //     'timer_end'=>$now,
        // ]);
        // Notification::send($this->rival, new \App\Notifications\NewMove());
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
    public function play(){
        $pop = rand(1,6);
        $this->dispatch('dados',pop: $pop);
    }

    public function render()
    {
        return view('livewire.ajedrez')->layout('layouts.ajedrez');
    }
}
