@extends('layouts.admin')
@section('content')
    <h2>Add news</h2>
    <a href='{{ route('admin.news.create') }}'>Go</a>

    <h2>Existing news</h2>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Categories</th>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @forelse($newslist as $news)
                    <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->categories->map(fn($item) => $item->title)->implode(', ') }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->author }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->description }}</td>
                    <td>{{ $news->created_at }}</td>
                    <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Upd / Del</a>
                    </td>
                    </tr>
                @empty
                    <h4>No news</h4>
                @endforelse
            </tbody>
        </table>
    {{ $newslist -> links() }}
@endsection
