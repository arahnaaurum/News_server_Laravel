@extends('layouts.main')
@section('content')
    <h1>Add order</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('order.store') }}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" value="{{ old('username') }}" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" id="phone" value="{{ old('phone') }}" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" value="{{ old('email') }}" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea id="comment" class="form-control" name="comment">{{ old('comment') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
