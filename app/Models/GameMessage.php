<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMessage extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id','game_id','body'];

    public function game(){
        return $this->hasOne(Game::class);
    }
}
