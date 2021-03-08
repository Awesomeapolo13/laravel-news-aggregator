<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function getCategories()
    {
        return \DB::table('categories')
            ->select('id', 'title', 'slug', 'description', 'created_at') //если убрать select(), то выберет все поля из таблицы
            ->get();
    }

    public function getCategory(int $id)
    {
        return \DB::table('categories')->find($id);
//        select("select id, title, slug, description, created_at from categories where id = :id", ['id' => $id]);
    }
}