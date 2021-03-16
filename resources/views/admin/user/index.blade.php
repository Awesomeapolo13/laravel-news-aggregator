@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users list</h1> &nbsp
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
                        Email
                    </th>
                    <th>
                        User groups
                    </th>
                    <th>
                        Registration date
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @if($user->is_admin === true)
                                Admin
                            @else
                                Simple user
                            @endif
                        </td>
                        <td>
                            {{ $user->created_at }}
                        </td>
                        <td>
                            <a href="{{ route('admin.user.show', ['user' => $user]) }}">Show.</a> &nbsp;
                            <a href="{{ route('admin.user.edit', ['user' => $user]) }}">Upd.</a> &nbsp;
                            <a
                                href="">Del.</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <h2>No users found</h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
        </div>

    </div>
@endsection
