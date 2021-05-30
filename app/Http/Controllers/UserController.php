<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Phone;

class UserController extends Controller
{
    public function test(){
        
        dd(User::with(relations: 'team')->get()->toArray());



        // // Можно так
        // // $user = new User;
        // // $user->name = 'blablabla';
        // // $user->email = 'blabla@mail.com';
        // // $user->save();

        // User::create([
        //     'first_name'=> 'Alexander', 
        //     'last_name'=> 'Pozdnyakov', 
        //     'username'=> 'STARosta'
        // ]);

        // Team::create([
        //     'name'=> 'GGWP',
        //     'rank'=> 1
        // ]);

        // Team::create([
        //     'name'=> 'GLHF',
        //     'rank'=> 2
        // ]);

        // Team::create([
        //     'name'=> 'Nagibators',
        //     'rank'=> 10
        // ]);

        
        // Phone::create([
        //     'user_id'=> 1,
        //     'phone_number'=> '+8-800-555-35-35'
        // ]);

        // Phone::create([
        //     'user_id'=> 8,
        //     'phone_number'=> '666'
        // ]);
    }

    public function test2(){
         dd(User::with(relations: 'phone')->get()->toArray());
    }
}
