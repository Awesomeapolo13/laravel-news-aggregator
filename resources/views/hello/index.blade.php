@extends('layouts.main')

@section('title')
    {{ $title }} @parent
@endsection

@section('header')
    {{ $title }}
@endsection

@section('content')

    <h1>Welcome to News Aggregator</h1>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi dolore dolorum ipsa rem voluptas
        voluptatum? Delectus dolor dolorem doloribus eum ipsum laborum, libero natus nobis quae rerum soluta
        suscipit!</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid distinctio dolores illum, iusto laborum odio
        omnis porro qui quia quos, ratione sint ut voluptate. Accusantium fugiat illo soluta veniam voluptate.</p>

@endsection

