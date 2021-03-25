<?php

namespace App\Http\Controllers;

use App\Jobs\NewsJob;
use App\Models\News;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParseController extends Controller
{


    public function __invoke()
    {
        $parsingLinks = [ // ссылки для парсинга
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/politics.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/championsleague.rss'
        ];

        foreach ($parsingLinks as $link) {
            NewsJob::dispatch($link);
        }

        echo 'Jobs added';
    }

//    public function politics(ParserService $service)
//    {
//        $politicsNews = $service->start('https://news.yandex.ru/politics.rss')['news'];
//        $createPoliticsNews = News::insert($politicsNews);
//
//        if ($createPoliticsNews) {
//            return redirect()->route('admin.news.index')->with('success', 'News parsed and added successfully');
//        }
//
//        return back()->withInput()->with('errors', ['News not added']);
//    }
}
