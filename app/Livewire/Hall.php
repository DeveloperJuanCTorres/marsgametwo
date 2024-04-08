<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;

class Hall extends Component
{
    public $users;

    public function getGamesProperty(){
        return auth()->user()->games()->get(); 
    }

    public function create_hall($user_id){
        $game = Game::create(['active'=>1]);
        $game->users()->attach([auth()->user()->id, $user_id]);
    }

    public function render()
    {
        return view('livewire.hall')->layout('layouts.app');
    }
}
