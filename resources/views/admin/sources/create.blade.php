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
                <label for="site">Site</label>
                <input type="text" id="site" value="{{ old('site') }}" class="form-control" name="site">
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" id="url" value="{{ old('url') }}" class="form-control" name="url">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
