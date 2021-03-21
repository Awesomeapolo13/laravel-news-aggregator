<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParseController extends Controller
{
    public function __invoke(ParserService $service)
    {
        dd($service->start('https://news.yandex.ru/music.rss'));
    }

    public function politics(ParserService $service)
    {
        $politicsNews = $service->start('https://news.yandex.ru/politics.rss')['news'];
        $createPoliticsNews = News::insert($politicsNews);

        if ($createPoliticsNews) {
            return redirect()->route('admin.news.index')->with('success', 'News parsed and added successfully');
        }

        return back()->withInput()->with('errors', ['News not added']);
    }
}
