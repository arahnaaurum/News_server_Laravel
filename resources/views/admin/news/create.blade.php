@extends('layouts.admin')
@section('content')
    <h1>Add news</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" value="{{ old('title') }}" class="'form-control" name="title">
            </div>
            <div class="form-group">
                <label for="descriprion">Description</label>
                <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" value="{{ old('author') }}" class="'form-control">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
