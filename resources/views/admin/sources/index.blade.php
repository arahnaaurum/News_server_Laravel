@extends('layouts.admin')
@section('content')

    <h2>Add Source</h2>
    <a href='{{ route('admin.sources.create') }}'>Go</a>

    <h2>Existing Sources</h2>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Site</th>
                <th>URL</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sources as $source)
                <tr>
                    <td>{{$source -> id}}</td>
                    <td>{{$source -> site}}</td>
                    <td>{{$source -> url}}</td>
                    <td>{{$source -> category_id}}</td>
                    <td><a href="{{ route('admin.sources.edit', ['source' => $source]) }}">Upd / Del</a>
                    </td>
                </tr>
    @empty
        <h3>No sources</h3>
    @endforelse
            </tbody>
        </table>
    {{ $sources -> links() }}
@endsection
