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
        [
            'category' => 'native',
            'title' => 'Native News 1',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'political',
            'title' => 'Political News 1',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'ecological',
            'title' => 'Ecological News 1',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'sports',
            'title' => 'Sports News 1',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'it',
            'title' => 'IT News 1',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'global',
            'title' => 'Global News 2',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'native',
            'title' => 'Native News 2',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'political',
            'title' => 'Political News 2',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'ecological',
            'title' => 'Ecological News 2',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'sports',
            'title' => 'Sports News 2',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'it',
            'title' => 'IT News 2',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'global',
            'title' => 'Global News 2',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'native',
            'title' => 'Native News 3',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'political',
            'title' => 'Political News 3',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'ecological',
            'title' => 'Ecological News 3',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'sports',
            'title' => 'Sports News 3',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'it',
            'title' => 'IT News 3',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
        [
            'category' => 'global',
            'title' => 'Global News 3',
            'subtitle' => 'Short description of news',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto cumque doloremque, doloribus est
                illo, incidunt inventore laboriosam perferendis quis ratione repudiandae temporibus voluptates
                voluptatibus? Beatae earum labore possimus reprehenderit totam.',
            'author' => 'Interesting Author',
            'created_at' => 'September 24, 2019'
        ],
    ];

    /**
     * Метод отображения страницы с категориями новостей и перечнем всех новостей
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
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
        $news = $this->listNews[$id]['category'] === $category ? $this->listNews[$id] : "News is not found";
        return view('news.show', ['title' => $this->title, 'currentCategory' => $category, 'categories' => $this->categories, 'news' => $news]);
    }

    /**
     * Метод отображения страницы добавления новости
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add()
    {
        return view('news.add', ['title' => $this->title, 'subtitle' => 'Add news', 'categories' => $this->categories]);
    }
}
