@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Refactor user</h1> &nbsp; <strong>
                <a href="{{ route('admin.user.index') }}">Users list</a></strong>
        </div>

        <!-- Content Row -->
        <div>
            <form action="{{ route('admin.user.update', ['user' => $user]) }}"
                  method="POST">
                @csrf
                @method('PUT')
                <div class="col-8">
                    <div class="form-group">
                        <label for="name">User name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                               value="{{ $user->name }}">
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                               value="{{ $user->email }}">
                        @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="is_admin">User groups</label>
                        <select class="form-control" name="is_admin" id="is_admin">
                            <option value="" disabled>Choose</option>
                            <option value="1"
                                    @if($user->is_admin)
                                    selected
                                @endif>Admin
                            </option>
                            <option value="0"
                                    @if(!$user->is_admin)
                                    selected
                                @endif>Simple user
                            </option>
                        </select>
                        @error('is_admin')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Save</button>

                </div>
            </form>
        </div>
    </div>
@endsection
