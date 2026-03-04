<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function index()
    {
         if (auth()->check()) {
        return redirect()->route('clients.index');
    }
        return view('welcome');
    }
}


