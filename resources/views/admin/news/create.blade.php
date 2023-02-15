@extends('layouts.admin')
@section('content')
    <h1>Add news</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_ids">Category</label>
                <select class="form-control @error('category_ids') is-valid @enderror" id="category_ids" name="category_ids[]"  multiple>
                    <option value="0">--Select category--</option>
                    @foreach($categories as $category)
                        <option @if((int)old('category_ids') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image">
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" value="{{ old('author') }}" class="form-control @error('author') is-invalid @enderror" name="author" >
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    @foreach($statuses as $status)
                        <option @if(old('status') === $status) selected @endif >{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector('#description') )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('description', options);
    </script>
@endpush
