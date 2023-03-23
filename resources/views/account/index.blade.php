@extends('layouts.app')
@section('content')
    <div class="col-8 offset-2">
        <h2>Welcome, {{ Auth::user()->name }}</h2>
        @if (Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar }}"  width="300" alt="avatar">
        @endif
        @if(Auth::user()->is_admin === true)
            <a href="{{ route('admin.index') }}">To Admin Panel</a>
        @endif
    </div>
@endsection
