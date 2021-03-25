@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add news</h1> &nbsp; <strong>
                <a href="{{ route('admin.news.index') }}">News list</a></strong>
        </div>

        <!-- Content Row -->
        <div>
{{--            @if($errors->any())--}}
{{--                @foreach($errors->all() as $err)--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        {{ $err }}--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            @endif--}}
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                {{--            Подписывает нашу форму, генерирует скрытое поле с токеном --}}
                @csrf
                <div class="col-8">
                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select class="form-control" name="category_id[]" id="categories" multiple>
                            @forelse($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @empty
                                <p>No categories found</p>
                            @endforelse
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">News title</label>
                        <input type="text" class="form-control" id="title" placeholder="title" name="title"
                               value="{{ old('title') }}">
                        @error('title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">News description</label>
                        <textarea class="form-control" id="description"
                                  name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">News image</label>
                        <input type="file" class="form-control" id="img" placeholder="title" name="image">
                    </div>
                    <div class="form-group">
                        <label for="statuses">News statuses</label>
                        <select class="form-control" name="status" id="statuses">
                            <option value="" disabled selected>Choose</option>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                            <option value="blocked">Blocked</option>
                        </select>
                        @error('status')
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
@push('js')
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#description'), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'outdent',
                        'indent',
                        '|',
                        'blockQuote',
                        'undo',
                        'redo'
                    ]
                },
                language: 'en',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',


            })
            .then(editor => {
                window.editor = editor;

            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
                console.warn('Build id: xr1lbvshn4k8-rzn5b6r6hoyd');
                console.error(error);
            });
    </script>
@endpush
