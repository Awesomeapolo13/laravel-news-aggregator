<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @var string - заголовок страницы
     */
    protected $title = 'News';
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
    /**
     * @var \string[][] - массив новостей
     */
    protected $listNews = [
        ['native', 'Native News 1'],
        ['political', 'Political News 1'],
        ['ecological', 'Ecological News 1'],
        ['sports', 'Sports News 1'],
        ['it', 'IT News 1'],
        ['global', 'Global News 2'],
        ['native', 'Native News 2'],
        ['political', 'Political News 2'],
        ['ecological', 'Ecological News 2'],
        ['sports', 'Sports News 2'],
        ['it', 'IT News 2'],
        ['global', 'Global News 2'],
        ['native', 'Native News 3'],
        ['political', 'Political News 3'],
        ['ecological', 'Ecological News 3'],
        ['sports', 'Sports News 3'],
        ['it', 'IT News 3'],
        ['global', 'Global News 3'],
    ];

    /**
     * Метод отображения страницы с категориями новостей и перечнем всех новостей
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        var_dump('something');
        return view('news.index', ['title' => $this->title, 'listNews' => $this->listNews, 'categories' => $this->categories]);
    }

    /**
     * Метод отображения страницы с новостями принадлежащими только одной категории
     * @param string $category - категория новостей
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(string $category)
    {
        if ($category === 'it') {
            $category = 'it';
        } else {
            $category = in_array(mb_convert_case($category, MB_CASE_TITLE, "UTF-8"), $this->categories) ? $category : "News is not found";
        }

        return view('news.category', ['title' => $this->title, 'currentCategory' => $category, 'listNews' => $this->listNews, 'categories' => $this->categories]);
    }

    /**
     * Метод отображения страницы конкретной новости
     * @param string $category - категория выбранной новости
     * @param int $id - идентификатор новости
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $category, int $id)
    {
        $news = $this->listNews[$id][0] === $category ? $this->listNews[$id][1] : "News is not found";
        return view('news.show', ['title' => $this->title, 'currentCategory' => $category, 'categories' => $this->categories, 'news' => $news]);
    }

    /**
     * Метод отображения страницы добавления новости
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add()
    {
        return view('news.add', ['title' => $this->title]);
    }
}
