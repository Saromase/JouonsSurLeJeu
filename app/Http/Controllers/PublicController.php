<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('public.welcome');
    }

    public function displayTeam()
    {
        return view('public.presentation');
    }
}
