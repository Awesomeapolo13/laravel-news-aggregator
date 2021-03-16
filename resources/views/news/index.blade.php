
@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @forelse ($newsList as $news)
                <x-newsElem :news="$news"></x-newsElem>
            @empty
                <h4>We have no news from that category. You can share some information</h4>
        @endforelse
        <!-- Pager -->
            <div class="clearfix">
                {{ $newsList->links() }}
{{--                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>--}}
            </div>
        </div>
    </div>
@endsection
