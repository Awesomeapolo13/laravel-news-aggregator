<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Отвечает за вывод всех записей
        $categories = Category::select('id', 'title')
            ->get();
        $newsList = News::select('id', 'title', 'description', 'status', 'created_at')
            ->with('categories')
            ->paginate(7);

        return view('admin.news.index', ['newsList' => $newsList, 'categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'title')
            ->get();
        //Обрабатывается гет-запросом для вывода формы добавления записи
        return view('admin.news.add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        $newsData = $request->only('title', 'description', 'status');

        $create = News::create($newsData);
        foreach ($request->only('category_id') as $categoryId) {
            News::find($create->id)->categories()->attach($categoryId);
        }

        if ($create) {
            return redirect()->route('admin.news.index')->with('success', 'New news added successfully');
        }

        return back()->withInput()->with('errors', 'New news not added');
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', ['news' => $news]);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::select('id', 'title')
            ->get();

        return view('admin.news.edit', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        $dataNews = $request->only('title', 'description', 'status');
        $updateNews = $news->fill($dataNews)->save();
        $deleteChN = $news->categories()->detach();
        foreach ($request->only('category_id') as $categoryId) {
            $news->categories()->attach($categoryId);
        }

        if ($updateNews && $deleteChN) {
            return redirect()->route('admin.news.index')->with('success', 'News updated successfully ');
        }

        return back()->withInput()->with('errors', ['News not updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Удаляет запись
    }
}
