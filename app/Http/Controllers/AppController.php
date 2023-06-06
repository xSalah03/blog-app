<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    public function Home()
    {
        return view("index");
    }
}
