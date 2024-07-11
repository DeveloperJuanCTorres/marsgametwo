<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'ubigeo_peru_districts';

    protected $fillable = [
        'id',
        'name',
        'province_id',
        'departament_id'

    ];
}
