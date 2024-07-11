<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'ubigeo_peru_provinces';

    protected $fillable = [
        'id',
        'name',
        'departament_id'

    ];
}
