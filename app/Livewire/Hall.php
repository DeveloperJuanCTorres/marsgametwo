<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use PHPUnit\Metadata\Uses;
use App\Models\User;

class Hall extends Component
{
    public $users;

    public function mount(){
        $this->users = User::where('id','<>',auth()->user()->id)->get();
    }

    public function getGamesProperty(){
        return auth()->user()->games()->get(); 
    }

    public function create_hall($user_id,$type){
        $game = Game::create([
            'type'=>$type,
            'active'=>1
        ]);
        $game->users()->attach([auth()->user()->id, $user_id]);
    }

    public function render()
    {
        return view('livewire.hall')->layout('layouts.app');
    }
}
