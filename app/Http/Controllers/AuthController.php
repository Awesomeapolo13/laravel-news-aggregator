<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @var string - заголовок страницы
     */
    protected $title = 'Authorization';

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
        return view('auth.index', ['title' => $this->title, 'categories' => $this->categories]);
    }
}
