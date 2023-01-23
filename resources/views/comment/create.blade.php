@extends('layouts.main')
@section('content')
    <h1>Add comment</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('comment.store') }}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" value="{{ old('username') }}" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea id="comment" class="form-control" name="comment">{{ old('comment') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
