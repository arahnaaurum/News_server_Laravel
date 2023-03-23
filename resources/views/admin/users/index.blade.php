@extends('layouts.admin')
@section('content')

        <h2>USERS</h2>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Admin status</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user -> id }}</td>
                    <td>{{ $user -> name }}</td>
                    <td>{{ $user -> email }}</td>
                    <td>{{ $user -> is_admin }}</td>
                    <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Change status</a>
                    </td>
                </tr>
    @empty
        <h3>No users</h3>
    @endforelse
            </tbody>
        </table>
    {{ $users -> links() }}
@endsection
