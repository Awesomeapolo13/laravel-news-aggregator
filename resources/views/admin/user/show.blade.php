@extends('layouts.admin')
@section('content')
    <h2>{{ $user->name }}</h2>
    <div>
        Email: {!! $user->email !!}
        <br>
        Group: @if($user->is_admin)
            Admin
        @else
            Simple user
        @endif
    </div>
@endsection
