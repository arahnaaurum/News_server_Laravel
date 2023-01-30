@extends('layouts.admin')
@section('content')
    <h1>Delete Category</h1>
    <form method="post" action=" {{ route('admin.categories.destroy', ['category' => $category]) }}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <h1>Edit Category</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" value="{{ $category->title }}" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description">{{ $category->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
