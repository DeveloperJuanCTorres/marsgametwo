<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\On; 

class Damas extends Component
{
    public $game, $adversary,$contact_id;
    public $chat;
    public $users;
    public $bodyMessage;

    public function mount(Game $game){
        $this->game = $game;
        $this->adversary = $game->users->where('id', '!=', auth()->id())->first();
        $this->users = collect();
        $this->chat = $this->game->messages()->get();
        $this->dispatch('playgame');
    }

    #[On('move')] 
    public function move($move){
        $now = date('H:i:s');
        $this->game->moves()->create([
            'user_id'=> auth()->user()->id,
            'move'=>$move,
            'timer_end'=>$now,
        ]);
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
        return view('livewire.damas')->layout('layouts.damas');
    }
}
