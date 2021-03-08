<?php

namespace App\Http\Controllers;

use App\Models\Category;

class AuthController extends Controller
{
    /**
     * @var string - заголовок страницы
     */
    protected $title = 'Authorization';

    public function index()
    {
        $categories = (new Category())->getCategories();
        return view('auth.index', ['title' => $this->title, 'categories' => $categories]);
    }
}
