<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On; 


class Ludo extends Component
{
     //Falta El cambio de pieza cuando el peon llega al otro lado
     public $game, $adversary,$contact_id;
     public $chat;
     public $users;
     public $bodyMessage;
     public $draughts;
     public $player;
     public $myColor;
     public $userAdversary;
 
     // public $jump;
     // public $line;
     // public $square;
 
     public $move;
 
     public function mount(Game $game){
         $this->game = $game;
         $this->userAdversary = $game->userAdversary; 
         $this->adversary = $game->users->where('id', '!=', auth()->id())->first();
         $this->users = collect();
         $this->chat = $this->game->messages()->get();
         //-------------Obtener el color que se asignó------
         $myUser = $this->game->myUser;
         $this->myColor = $myUser->pivot->color;
          //----------------------
         $this->InitBoard();
     }
 
     public function InitBoard(){
            $draughtsInitial = 
            '[{"color": "red", "id": 101,"position": "red101","value":"1","key":0,"status":0},
            {"color": "red", "id": 102,"position": "red102","value":"2","key":1,"status":0},
            {"color": "red", "id": 103,"position": "red103","value":"3","key":2,"status":0},
            {"color": "red", "id": 104,"position": "red104","value":"4","key":3,"status":0},
            {"color": "yellow", "id": 201,"position": "yellow201","value":"1","key":0,"status":0},
            {"color": "yellow", "id": 202,"position": "yellow202","value":"2","key":1,"status":0},
            {"color": "yellow", "id": 203,"position": "yellow203","value":"3","key":2,"status":0},
            {"color": "yellow", "id": 204,"position": "yellow204","value":"4","key":3,"status":0}
            ]';
         //consulto el ultimo movimiento para dibujar el tablero si no hay moviemeos agrego el tablero inicial
         $stringMove = $this->game->moves()->get()->last()?? [];
         if($stringMove) {
             $this->draughts = json_decode($stringMove->move);
             $this->player =  $stringMove->color;
             $this->move = [
                 'jump' => $stringMove->jump,
                 'line' => $stringMove->line,
                 'square' => $stringMove->square,
                 'eat' =>  $stringMove->position,
             ];
         } else{
             $this->player = 'red';
             $this->draughts = json_decode($draughtsInitial);
             $this->move = [
                 'jump' => 0,
                 'line' => '',
                 'square' => '',
                 'eat' => 0,
             ];
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
        //  Notification::send($this->userAdversary, new \App\Notifications\NewMove());
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
         $this->dispatch('notificateEchoJs',$this->move, $this->player,$this->myColor);
     }
 
     #[On('render')] 
    public function render()
    {
        if( $this->player <> $this->myColor){
            $this->InitBoard();
            $this->dispatch('iniliziateJs',$this->draughts, $this->player,$this->myColor);
        }

        $this->dispatch('scrollIntoView');
        return view('livewire.ludo')->layout('layouts.ludo');
    }
    




}
