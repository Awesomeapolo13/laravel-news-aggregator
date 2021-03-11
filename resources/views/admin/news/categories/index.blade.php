@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories list</h1> &nbsp; <strong>
                <a href="{{ route('admin.categories.create') }}">Add category</a></strong>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
    @endif

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
                        Slug
                    </th>
                    <th>
                        Additions date
                    </th>
                    <th>
                        Management
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            {{ $category->title }} (News count: {{ $category->news->count() }})
                        </td>
                        <td>
                            {{ $category->slug }}
                        </td>
                        <td>
                            {{ $category->created_at }}
                        </td>
                        <td>
                            <a href="{{ route('admin.categories.show', ['category' => $category->id]) }}">Show.</a>
                            &nbsp; <a
                                href="{{ route('admin.categories.edit', ['category' => $category]) }}">Upd.</a> &nbsp;
                            <a href="">Del.</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <h2>No categories found</h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>

    </div>
@endsection
