<?php

namespace App\Helpers;

class ArrHelper
{
    /** Функция, преобразующая массив
     * При использовании join со связью многие к многим выводится много повторяющихся записей.
     * Функция преобразует массив создавая в нем клюс с именем field,в которое записывается массив
     * из не повторяющихся данных (например у новости много категорий, все они будут момещены в массив с ключем 'category')
     */

     /**
     * @param array $arr - исходный массив
     * @param $field - имя ключа
     * @return array
     */
    public static function transformNewsArr($arr, $field)
    {
        $transformedArr = [];
        $i = 0;
        foreach ($arr as $elem) {

            if (empty($transformedArr)) {
                $transformedArr[$i] = $elem;
                $transformedArr[$i][$field] = [$elem[$field]];
            } elseif ($elem['id'] !== $transformedArr[$i]['id']) {
                $i++;
                $transformedArr[$i] = $elem;
                $transformedArr[$i][$field] = [$elem[$field]];
            } else {
                $transformedArr[$i][$field][] = $elem[$field];
            }
        }

        return $transformedArr;
    }

    /** Функция, поиска необходимой новости
     */

    /**
     * @param $newsArr - массив новостей
     * @param $newsId - идентификатор новости
     * @param $category - категория новости
     * @return mixed|string
     */
    public static function foundNews(array $newsArr, int $newsId, string $category)
    {
        foreach ($newsArr as $news) {
            if (in_array(ucfirst($category), $news['category']) && $news['id'] === $newsId) {
                return $news;
            }
        }
        return 'News is not found';
    }
}
