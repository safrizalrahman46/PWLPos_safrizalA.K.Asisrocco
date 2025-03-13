<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // public function hello()
    // {
    //     return 'Hello World';
    // }


    // public function greeting()
    // {
    //     return view('blog.hello', ['name' => 'SAFRIZAL RAHMAN']);
    // }

    // public function hello()
    // {
    //     return ('Hello World');
    // }
    // public function greeting()
    // {
    //     return view('blog.hello')->with('name', 'SAFRIZAL RAHMAN')
    //         ->with('occupation', 'RAPstronaut / NAKAMA / BRAVY BABY');
    // }

    public function index(){

        $breadcrumb = (object) [
        'title' => 'Selamat Datang',
        'list' => ['Home', 'Welcome' ]

        ];

        $activeMenu = 'dashboard';

        return view('welcome', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);

        }
}
