@extends('layouts.admin')
@section('content')
    @forelse($categorieslist as $category)
    <div>
        <h3 class="pb-3 mb-4 font-italic border-bottom">
                {{$category -> title}}
        </h3>
        <p>{{$category -> description}}</p>
        <p>{{$category -> created_at}}</p>
    </div>
    @empty
        <h3>No categories</h3>
    @endforelse
@endsection
