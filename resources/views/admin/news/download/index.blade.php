@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Download information</h1> &nbsp;<strong>
                <a href="{{ route('admin.download.create') }}">Add download</a></strong>
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
                        Name
                    </th>
                    <th>
                        Phone
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        News list
                    </th>
                    <th>
                        Request
                    </th>
                    <th>
                        Additions date
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($downloads as $download)
                    <tr>
                        <td>
                            {{ $download->id }}
                        </td>
                        <td>
                            {{ $download->name }}
                        </td>
                        <td>
                            {{ $download->phone }}
                        </td>
                        <td>
                            {{ $download->email }}
                        </td>
                        <td>
                            {{--                            @forelse($download->newsList as $news)--}}
                            {{--                                {{ $news->title }}<br>--}}
                            {{--                            @empty--}}
                            {{--                                No category found--}}
                            {{--                            @endforelse--}}
                            @if(!empty($download->news->title))
                                {{ $download->news->title }}
                            @else
                                No news found
                            @endif
                        </td>
                        <td>
                            {{ $download->info }}
                        </td>
                        <td>
                            {{ $download->created_at }}
                        </td>
                        <td>
{{--                            <a href="{{ route('admin.download.show', ['downloads' => $downloads]) }}">Show.</a> &nbsp;--}}
{{--                            <a href="{{ route('admin.download.edit', ['downloads' => $downloads]) }}">Upd.</a> &nbsp;--}}
                            <a
                                href="">Del.</a>
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
            {{ $downloads->links() }}
        </div>
    </div>
@endsection
