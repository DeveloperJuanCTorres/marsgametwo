<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Game extends Model
{
    use HasFactory;
    protected $fillable =  ['type','winer','active'];

    //Mutadores
    public function adversary(): Attribute
    {
        return new Attribute(
            get: function($value){
               $user = $this->users->where('id', '!=', auth()->id())->first();
               return  $user->name;
            }
        );
    }

    public function userAdversary(): Attribute
    {
        return new Attribute(
            get: function($value){
               $user = $this->users->where('id', '!=', auth()->id())->first();
               return  $user;
            }
        );
    }

    public function myUser(): Attribute
    {
        return new Attribute(
            get: function($value){
               $user = $this->users->where('id', auth()->id())->first();
               return  $user;
            }
        );
    }

   public function users(){
       return $this->belongsToMany(User::class)->withPivot('color');
   }

    public function moves(){
        return $this->hasMany(GameMove::class);
    }

    public function messages(){
        return $this->hasMany(GameMessage::class);
    }
}
