<?php declare(strict_types=1);


namespace App\Services;

use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserService
{
    protected $parsingLinks = [ // ссылки для парсинга
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/music.rss',
        'https://news.yandex.ru/auto.rss',
        'https://news.yandex.ru/politics.rss'
//        'https://news.yandex.ru/army.rss',
    ];

    public function start(string $url): array
    {
        $xml = XmlParser::load($url);

        return $xml->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'links' => [
                'uses' =>'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
    }
}
