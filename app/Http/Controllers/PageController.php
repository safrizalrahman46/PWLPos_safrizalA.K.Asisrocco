<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return "Welcome To the GANKK";
    }

    public function about()
    {
        return "SAFRIZAL RAHMAN THE QONQUIROR | 2341760151";
    }

    public function articles($id)
    {
        return "Article Page with dan dengan Id " . $id;
    }
}
