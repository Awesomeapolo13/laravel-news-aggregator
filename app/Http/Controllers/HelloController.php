<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    protected $title = 'Welcome to News Aggregator';

    public function index()
    {
        return view('hello.index', ['title' => $this->title]);
    }
}
