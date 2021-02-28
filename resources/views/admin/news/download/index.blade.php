@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Download information</h1> &nbsp;
        </div>

        <!-- Content Row -->
        <div>
            @if(!empty($_GET['success']))
                <div class="alert alert-success">
                    <p>Your successful request is sent</p>
                    <br>
                    <a href="{{ route('admin.download.create') }}">Make a new request</a>
                </div>
            @else
                @if($errors->any())
                    @foreach($errors->all() as $err)
                        <div class="alert alert-danger">
                            {{ $err }}
                        </div>
                    @endforeach
                @endif
                <form action="{{ route('admin.download.store') }}" method="POST">
                    {{--            Подписывает нашу форму, генерирует скрытое поле с токеном --}}
                    @csrf
                    <div class="col-8">
                        <div class="form-group">
                            <label for="name">Customer name</label>
                            <input type="text" class="form-control" id="name" placeholder="Customer name" name="name"
                                   value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone"
                                   value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="info">Information</label>
                            <textarea class="form-control" id="info"
                                      name="info" placeholder="Write your request here">{{ old('info') }}</textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
