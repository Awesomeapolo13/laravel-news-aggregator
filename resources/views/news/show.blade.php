@extends('layouts.main')

@section('title')
    {{ $news['title'] }} @parent
@endsection

@section('header')
    {{ $news['title'] }}
@endsection

@section('content')

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <h4>{{ $news['title'] }}</h4>
                    {{ $news['body'] }}
                    <p><a href="{{ route('admin.news.index') }}">В админку</a></p>
                </div>
            </div>
        </div>
    </article>

@endsection
