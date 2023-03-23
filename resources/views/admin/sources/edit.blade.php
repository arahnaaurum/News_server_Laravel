@extends('layouts.admin')
@section('content')
    <h1>Delete Source</h1>
    <form method="post" action=" {{ route('admin.sources.destroy', ['source' => $source]) }}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <h1>Edit Source</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.sources.update', ['source' => $source]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control @error('category_id') is_invalid @enderror" id="category_id" name="category_id">
                    <option value="0">--Select category--</option>
                    @foreach($categories as $category)
                        <option @if($source->category_id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="site">Site</label>
                <input type="text" id="site" value="{{ $source->site }}" class="form-control @error('site') is_invalid @enderror" name="site" >
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" id="url" value="{{ $source->url }}" class="form-control @error('url') is_invalid @enderror" name="url" >
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
