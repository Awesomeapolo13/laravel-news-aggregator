# Аггрегатор новостей

## Описание

Проект представляет собой аггрегатор новостей.
Дает пользователям возможность писать статьи, оставлять комментарии и обратную связь.
Позволяет парсить новости с https://news.yandex.ru.
Валидация выполнена в классах Request.
Для шаблонизации используется blade.


## Деплой

Для работы проекта необходимо установить Laravel sail, подробнее как это сделать тут - https://laravel.com/docs/8.x/sail
1) После клонирования проекта необходимо установить зависимости проекта. Для этого в корне проекта выполняем команду
```shell
composer install
```
2) Копируем файл .env.dist как .env. Заполняем его необходимыми данными для docker-compose.yml файла.

3) В корне проекта выполняем команду для сборки и поднятия его в docker контейнерах
```shell
sail up -d
```
4) Запускаем миграции
```shell
php artisan migrate 
```
5) Заполнить базу данных фейковыми данными с помощью сидов
```shell
php artisan db:seed
```
