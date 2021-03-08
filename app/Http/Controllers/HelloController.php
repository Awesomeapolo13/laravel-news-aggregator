<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    /**
     * @var string - заголовок страницы
     */
    protected $title = 'Welcome to News Aggregator';

    public function index()
    {
        $categories = (new Category())->getCategories();
        return view('hello.index', ['title' => $this->title, 'categories' => $categories]);
    }
}
