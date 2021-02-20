<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    /**
     * @var string - заголовок страницы
     */
    protected $title = 'Welcome to News Aggregator';

    /**
     * @var string[] - массив категорий для новостей
     */
    protected $categories = [
        'Native',
        'Political',
        'Ecological',
        'Sports',
        'IT',
        'Global'
    ];

    public function index()
    {
        return view('hello.index', ['title' => $this->title, 'categories' => $this->categories]);
    }
}
