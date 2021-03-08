<?php

namespace App\Http\Controllers;

use App\Helpers\ArrHelper;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @var string - заголовок страницы
     */
    protected $title = 'News';

    /**
     * Метод отображения страницы с категориями новостей и перечнем всех новостей
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = (new Category())->getCategories();
        $newsList = (new News())->getNews();
        $newsList = ArrHelper::transformNewsArr(json_decode($newsList, true), 'category');

        return view('news.index', ['title' => $this->title, 'newsList' => $newsList, 'categories' => $categories]);
    }

    /**
     * Метод отображения страницы с новостями принадлежащими только одной категории
     * @param string $category - категория новостей
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(string $category)
    {
        $categories = (new Category())->getCategories();
        $newsList = (new News())->getNews();
        $newsList = ArrHelper::transformNewsArr(json_decode($newsList, true), 'category');

        return view('news.category', ['title' => $this->title, 'currentCategory' => $category, 'newsList' => $newsList, 'categories' => $categories]);
    }

    /**
     * Метод отображения страницы конкретной новости
     * @param string $category - категория выбранной новости
     * @param int $id - идентификатор новости
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $category, int $id)
    {
        $categories = (new Category())->getCategories();
        $newsList = (new News())->getNews();
        $newsList = ArrHelper::transformNewsArr(json_decode($newsList, true), 'category');
        $news = ArrHelper::foundNews($newsList, $id, $category);

        return view('news.show', ['title' => $this->title, 'currentCategory' => $category, 'categories' => $categories, 'news' => $news]);
    }

    /**
     * Метод отображения страницы добавления новости
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add()
    {
        $categories = (new Category())->getCategories();

        return view('news.add', ['title' => $this->title, 'subtitle' => 'Add news', 'categories' => $categories]);
    }
}
