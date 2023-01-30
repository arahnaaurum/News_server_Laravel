@extends('layouts.admin')
@section('content')

    <h2>Add category</h2>
    <a href='{{ route('admin.categories.create') }}'>Go</a>

    <h2>Existing categories</h2>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{$category -> id}}</td>
                    <td>{{$category -> title}}</td>
                    <td>{{$category -> description}}</td>
                    <td>{{$category -> created_at}}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Upd / Del</a>
                    </td>
                </tr>
    @empty
        <h3>No categories</h3>
    @endforelse
            </tbody>
        </table>
    {{ $categories -> links() }}
@endsection
