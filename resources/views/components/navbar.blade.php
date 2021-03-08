<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('hello') }}">News Aggregator</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hello') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news.index') }}">News</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownCategories"
                       data-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownCategories">
                        @forelse($categories as $category)
                            <li><a href="{{ route('news.category', ['category' => strtolower($category->title)]) }}"
                                   class="dropdown-item">{{ $category->title }}</a></li>
                        @empty
                            <li><a href="#" class="dropdown-item">Categories not found</a></li>
                        @endforelse
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('add') }}">Add news</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('feedback.create') }}">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth') }}">Sign in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
