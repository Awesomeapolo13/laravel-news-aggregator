<div class="post-preview">
    <a href="{{ route('news.show', ['id' => $key, 'category' => $news['category']]) }}">
        <h2 class="post-title">
            {{ $news['title'] }}
        </h2>
        <h3 class="post-subtitle">
            {{ $news['subtitle'] }}
        </h3>
    </a>
    <p class="post-meta">Posted by
        <a href="#">{{ $news['author'] }}</a>
        on {{ $news['created_at'] }}</p>
</div>
<hr>
