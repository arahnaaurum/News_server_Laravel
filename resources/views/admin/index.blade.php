@extends('layouts.admin')
@section('title') Main @endsection
@section('content')
<div>
    <a href="{{ route('admin.parser') }}">Parse news</a>
</div>
@endsection
