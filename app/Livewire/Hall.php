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

        // switch($type)

        switch($type) {
            case 'Serpientes':
                $game->users()->attach([auth()->user()->id =>['color'=>'cyan'], $user_id=>['color'=>'red']]);
                break;

            case 'Ajedrez':
                $game->users()->attach([auth()->user()->id =>['color'=>'black'], $user_id=>['color'=>'white']]);
                break;

            case 'Ludo':
                $game->users()->attach([auth()->user()->id =>['color'=>'red'], $user_id=>['color'=>'yellow']]);
                break;
            
            default:
                $game->users()->attach([auth()->user()->id =>['color'=>'B'], $user_id=>['color'=>'W']]);
                break;
        }
        //$game->users()->attach([auth()->user()->id, $user_id]);
    }

    public function render()
    {
        return view('livewire.hall')->layout('layouts.app');
    }
}
