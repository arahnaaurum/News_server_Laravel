@extends('layouts.main')
@section('content')
    <div class="row mb-2">
    @forelse($newslist as $news)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">{{ $news -> author }}</strong>
                    <h3 class="mb-0">{{ $news->title }}</h3>
                    <p class="mb-0">
                        {{ $news->categories->map(fn($item) => $item->title)->implode(' ') }}
                    </p>
                    <div class="mb-1 text-muted">{{ $news->image }}</div>
                    <div class="mb-1 text-muted">{{ $news->status }}</div>
                    <div class="mb-1 text-muted">{{ $news->created_at }}</div>
                    <p class="card-text mb-auto">{{ $news->description }}</p>
                    <a href="{{ route('news.show', ['id' => $news->id]) }}">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
            </div>
        </div>
        @empty
            <h2>No news</h2>
        @endforelse
    </div>
@endsection
