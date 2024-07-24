<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On; 
use Illuminate\Support\Carbon;

class Ajedrez extends Component
{
    public $game, $adversary, $contact_id;
    public $chat;
    public $users;
    public $bodyMessage;
    public $draughts;
    public $player;
    public $myColor;
    public $userAdversary;
    public $move;

    public $timeWhite='';
    public $timeBlack='';

    public function mount(Game $game){
        $this->game = $game;
        $this->userAdversary = $game->userAdversary; 
        $this->adversary = $game->users->where('id', '!=', auth()->id())->first();
        $this->users = collect();
        $this->chat = $this->game->messages()->get();
        //-------------Obtener el color que se asignó------
        $myUser = $this->game->myUser;
        $this->myColor = $myUser->pivot->color;
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
            {"name": "pawn","line": "l2","square": "c1","figure": "♟","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c2","figure": "♟","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c3","figure": "♟","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c4","figure": "♟","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c5","figure": "♟","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c6","figure": "♟","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c7","figure": "♟","color": "white","state": 1},
            {"name": "pawn","line": "l2","square": "c8","figure": "♟","color": "white","state": 1},
            {"name": "pawn","line": "l7","square": "c1","figure": "♟","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c2","figure": "♟","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c3","figure": "♟","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c4","figure": "♟","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c5","figure": "♟","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c6","figure": "♟","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c7","figure": "♟","color": "black","state": 1},
            {"name": "pawn","line": "l7","square": "c8","figure": "♟","color": "black","state": 1},
            {"name": "rook","line": "l8","square": "c1","figure": "♜","color": "black","state": 1},
            {"name": "knight","line": "l8","square": "c2","figure": "♞","color": "black","state": 1},
            {"name": "bishop","line": "l8","square": "c3","figure": "♝","color": "black","state": 1},
            {"name": "queen","line": "l8","square": "c4","figure": "♛","color": "black","state": 1},
            {"name": "king","line": "l8","square": "c5","figure": "♚","color": "black","state": 1},
            {"name": "bishop","line": "l8","square": "c6","figure": "♝","color": "black","state": 1},
            {"name": "knight","line": "l8","square": "c7","figure": "♞","color": "black","state": 1},
            {"name": "rook","line": "l8","square": "c8","figure": "♜","color": "black","state": 1}]';
        //consulto el ultimo movimiento para dibujar el tablero si no hay moviemeos agrego el tablero inicial
        $stringMove = $this->game->moves()->get()->last() ?? [];
        if($stringMove) {
            $this->draughts = json_decode($stringMove->move);
            $this->player =  $stringMove->color;
            $this->move = [
                'jump' => $stringMove->jump,
                'line' => $stringMove->line,
                'square' => $stringMove->square,
                'eat' =>  $stringMove->position,
            ];

            //Obtener el tiempo de juego restante
            $now = date('Y-m-d H:i:s');
            $formatted_dt1 = Carbon::parse($stringMove->created_at)->addMinute(2);
            $formatted_dt2 = Carbon::parse($now);
            if($formatted_dt1->gt($formatted_dt2)){
                 $date_diff = $formatted_dt1->diffInSeconds($formatted_dt2);
                 $timer = gmdate('i:s', $date_diff);
            }else{
                 $timer = '00:02';
            }

            if($stringMove->color == 'white'){
                $this->timeBlack =  $timer;
            }else{
                $this->timeWhite =  $timer;
            }
            //----------------------------
        } else{
            $this->player = 'black';
            $this->draughts = json_decode($draughtsInitial);
            $this->move = [
                'jump' => 0,
                'line' => '',
                'square' => '',
                'eat' => 0,
            ];
            //Obtener el tiempo de juego restante
            $now = date('Y-m-d H:i:s');
            $formatted_dt1 = Carbon::parse($this->game->created_at)->addMinute(2);
            $formatted_dt2 = Carbon::parse($now);
            if($formatted_dt1->gt($formatted_dt2)){
                 $date_diff = $formatted_dt1->diffInSeconds($formatted_dt2);
                 $this->timeWhite = gmdate('i:s', $date_diff);
            }else{
                $this->timeWhite = '00:02';
            }
            //----------------------------
        }
    }

    #[On('move')] 
    public function move($move,$color,$jump,$line,$square,$eat){
        $now = date('H:i:s');
        $jsonString = json_encode($move);
        $this->game->moves()->create([
            'user_id'=> auth()->user()->id,
            'move'=>$jsonString,
            'color'=>$color,
            'jump'=>$jump,
            'position'=>$eat,
            'line'=>$line,
            'square'=>$square,
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
        $this->dispatch('notificateEchoJs',$this->move, $this->player, $this->myColor);
    }

    #[On('render')] 
    public function render()
    {
        if( $this->player <> $this->myColor){
            $this->InitBoard();
            $this->dispatch('iniliziateJs',$this->draughts, $this->player,$this->myColor);
        }
        $this->dispatch('scrollIntoView');
        return view('livewire.ajedrez')->layout('layouts.ajedrez');
    }
}
