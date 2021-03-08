<div class="post-preview">
    <a href="{{ route('news.show', ['category' => $news['category'][0], 'id' => $news['id'],]) }}">
        <h2 class="post-title">
            {{ $news['title'] }}
        </h2>
{{--        <h3 class="post-subtitle">--}}
{{--            {{ $news->title }}--}}
{{--        </h3>--}}
    </a>
    <p class="post-meta">Posted by
        <a href="#">Guest</a>
        on {{ $news['created_at'] }}</p>
</div>
<hr>
