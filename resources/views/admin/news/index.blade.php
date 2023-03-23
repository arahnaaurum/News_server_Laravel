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
                    <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Upd/Del</a>
                        <a href="" class="delete" rel="{{ $news->id }}">Del</a>
                    </td>
                    </tr>
                @empty
                    <h4>No news</h4>
                @endforelse
            </tbody>
        </table>
    {{ $newslist -> links() }}
@endsection

@push('js')
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function(){
                    let elements = document.querySelectorAll('.delete');
                    elements.forEach(function (el, key) {
                        el.addEventListener('click', function(){
                            const id = this.getAttribute('rel');
                            if(confirm('Delete news?')) {
                                send(`/admin/news/${id}`).then(() => {
                                    location.reload();
                                });
                            } else {
                                alert('Delete aborted');
                            }
                        });
                    });
                })

                async function send(url) {
                    let response = await fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });
                    let result = await response.json();
                    return result;
                }
            </script>

@endpush
