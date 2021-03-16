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
        $categories = Category::all();
        $newsList = News::select('id', 'title', 'description', 'status', 'created_at')
            ->with('categories')
            ->paginate(7);

        return view('news.index', ['title' => $this->title, 'newsList' => $newsList, 'categories' => $categories]);
    }

    /**
     * Метод отображения страницы с новостями принадлежащими только одной категории
     * @param string $category - категория новостей
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(string $category)
    {
        $categories = Category::all();
        $newsList = News::select('id', 'title', 'description', 'status', 'created_at')
            ->with('categories')
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('title', '=', ucfirst($category));
            })
            ->paginate(7);
        return view('news.category',
            [
                'title' => $this->title,
                'currentCategory' => $category,
                'newsList' => $newsList,
                'categories' => $categories
            ]);
    }

    /**
     * Метод отображения страницы конкретной новости
     * @param string $category - категория выбранной новости
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $category, News $news)
    {
        $categories = Category::all();
        return view('news.show', ['title' => $this->title, 'currentCategory' => $category, 'categories' => $categories, 'news' => $news]);
    }

    /**
     * Метод отображения страницы добавления новости
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add()
    {
        $categories = Category::all();

        return view('news.add', ['title' => $this->title, 'subtitle' => 'Add news', 'categories' => $categories]);
    }
}
