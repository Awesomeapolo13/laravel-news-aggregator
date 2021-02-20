@extends('layouts.main')

@section('title')
    {{ $subtitle }} @parent
@endsection

@section('header')
    {{ $subtitle }}
@endsection

@section('content')

    <h1><?= $subtitle ?></h1>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Title" id="title" required data-validation-required-message="Please enter news title.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Category</label>
                        <input type="email" class="form-control" placeholder="Category" id="category" required data-validation-required-message="Please choose news category.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Author</label>
                        <input type="text" class="form-control" placeholder="Author" id="author" required data-validation-required-message="Please enter news author.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Test</label>
                        <textarea rows="5" class="form-control" placeholder="Text" id="body" required data-validation-required-message="Please enter a news text."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <button type="submit" class="btn btn-primary" id="sendNewsButton">Send</button>
            </form>
        </div>
    </div>

@endsection
