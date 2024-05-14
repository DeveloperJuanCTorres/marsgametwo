<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMove extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id','game_id','move','color','position','jump','timer_end'];

    public function game(){
        return $this->hasOne(Game::class);
    }
}
