<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image', 'status', 'link', 'guid',
    ];

    public function getNews()
    {
        return \DB::table('news')
            ->leftjoin('categories_has_news', 'news.id', '=', 'categories_has_news.news_id')
            ->leftjoin('categories', 'categories.id', '=', 'categories_has_news.category_id' )
            ->select('news.id', 'news.title', 'news.description', 'news.status', 'news.created_at', 'categories.title as category')
            ->groupBy('news.id', 'categories.title')
            ->get();
    }

    public function categories(): BelongsToMany
    {
        //указываем через какую таблиуц и по какому ключу будет осуществляться связь (если связь основных таблиц осуществляется не по ключу id, надо это указать тоже)
        return $this->belongsToMany(Category::class, 'categories_has_news', 'news_id', 'category_id');
    }

    public function downloads(): HasMany
    {
        return $this->hasMany(Download::class, 'news_id', 'id');
    }
}
