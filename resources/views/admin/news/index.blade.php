@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">News list</h1> &nbsp; <strong>
                <a href="{{ route('admin.news.create') }}">Add news</a></strong>
        </div>

        <!-- Content Row -->
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        #ID
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Additions date
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($newsList as $news)
                    <tr>
                        <td>
                            {{ $news['id'] }}
                        </td>
                        <td>
                            {{ $news['title'] }}
                        </td>
                        <td>
                            @forelse($news['category'] as $category)
                                {{ $category }}<br>
                            @empty
                                No category found
                            @endforelse
                        </td>
                        <td>
                            {{ $news['status'] }}
                        </td>
                        <td>
                            {{ $news['created_at'] }}
                        </td>
                        <td>
                            <a href="{{ route('admin.news.show', ['news' => $news['id']]) }}">Show.</a> &nbsp; <a
                                href="">Upd.</a> &nbsp; <a href="">Del.</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <h2>No news found</h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
