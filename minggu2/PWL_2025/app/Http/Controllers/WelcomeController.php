<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function hello () {
        return 'Hello World';
    }

    // public function greeting () {
    //     return view ('blog.hello', ['name' => 'Gwido Putra W']);
    // }

    public function greeting () {
        return view ('blog.hello')
        -> with('name', 'Gwido Putra W')
        -> with('occupation', 'Astronaut');
    }
}