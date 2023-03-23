@extends('layouts.admin')
@section('content')
    <h1>Add Source</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.sources.store') }}">
            @csrf
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" @error('category_id') @enderror>
                    <option value="0">--Select category--</option>
                    @foreach($categories as $category)
                        <option @if((int)old('category_id') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="site">Site</label>
                <input type="text" id="site" value="{{ old('site') }}" class="form-control" name="site" @error('site') @enderror>
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" id="url" value="{{ old('url') }}" class="form-control" name="url" @error('url') @enderror>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
