<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function websocket(){
        try {
            return Artisan::call('websockets:serve');
        } catch (\Throwable $th) {
            return ['error'=>'Error! websocket:serve'.$th->getMessage()];
        }
    }

    public function work(){
        try {
            return Artisan::call('queue:work');
        } catch (\Throwable $th) {
        return ['error'=>'Error! queue work'];
        }
    }

    public function storage(){
        try {
            return Artisan::call('storage:link');
        } catch (\Throwable $th) {
        return ['error'=>'Error! storage link'];
        }
    }

    public function store(){
        return view('store');
    }
}