<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    //имя таблицы указывается, если оноотличается от стандарта (стандарт - если модель Category, то таблицы по умолчанию - categories)
    protected $table = 'categories';
    // в свойсве primaryKey можно указать первичный ключь, если он отличается от id

    // $fillable - перечислить поля, которые разрешено обновлять
    protected $fillable = [
        'title', 'slug', 'description'
    ];

//    $guarded - перечисляет поля, которые обновлять нельзя (указывается либо $guarded, либо $fillable)
//    protected $guarded = ['id'];

    public function getCategories()
    {
        return \DB::table('categories')
            ->select('id', 'title', 'slug', 'description', 'created_at') //если убрать select(), то выберет все поля из таблицы
            ->paginate(7);
    }

//    public function getCategory(int $id)
//    {
//        return \DB::table('categories')->find($id);
//        select("select id, title, slug, description, created_at from categories where id = :id", ['id' => $id]);
//    }

    //создаем связь с таблицей news
    public function news(): BelongsToMany
    {
        //указываем через какую таблиуц и по какому ключу будет осуществляться связь (если связь основных таблиц осуществляется не по ключу id, надо это указать тоже)
        return $this->belongsToMany(News::class, 'categories_has_news', 'category_id', 'news_id');
    }
}
