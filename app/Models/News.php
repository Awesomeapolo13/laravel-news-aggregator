<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function getNews()
    {
        return \DB::table('news')
            ->leftjoin('categories_has_news', 'news.id', '=', 'categories_has_news.news_id')
            ->leftjoin('categories', 'categories.id', '=', 'categories_has_news.category_id' )
            ->select('news.id', 'news.title', 'news.description', 'news.status', 'news.created_at', 'categories.title as category')
            ->groupBy('news.id', 'categories.title')
            ->get();
    }

    public function getOneNews(int $id)
    {
        return \DB::table('news')->find($id);
    }
}
