@extends('layouts.main')

@section('title')
    {{ $title }} @parent
@endsection

@section('header')
    {{ $title }}
@endsection

@section('content')

    <p>Here you could send a feedback about our blog.
        <br>
        We need to know your opinion to become better.</p>
{{--    @if($errors->any())--}}
{{--        @foreach($errors->all() as $err)--}}
{{--            <div class="alert alert-danger">--}}
{{--                {{ $err }}--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    @endif--}}
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form name="sentFeedback" id="contactForm" method="POST" action="{{ route('feedback.store') }}" novalidate >
                @csrf
                <div class="control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label for="name">User name</label>
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" required
                               data-validation-required-message="Please enter your name" value="{{ old('name') }}">
                        <p class="help-block text-danger"></p>
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label for="comment">Comment</label>
                        <textarea rows="5" class="form-control" placeholder="Comment" id="comment" name="comment"
                                  required data-validation-required-message="Please enter your comment">{{ old('comment') }}</textarea>
                        <p class="help-block text-danger"></p>
                        @error('comment')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <button type="submit" class="btn btn-primary" id="sendNewsButton">Send</button>
            </form>
        </div>
    </div>

@endsection
