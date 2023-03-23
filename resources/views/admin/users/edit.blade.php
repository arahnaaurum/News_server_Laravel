@extends('layouts.admin')
@section('content')

    <h1>Make {{ $user->name }} admin?</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form method="post" action=" {{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('patch')

            <div class="form-group">
                <label for="is_admin">Admin status</label>
                <select class="form-control" id="is_admin" name="is_admin">
                    <option value="0">--Select status --</option>
                    <option value="{{ $user->is_admin }}">{{ $user->is_admin }}</option>
                    <option value="{{ !$user->is_admin }}">{{ !$user->is_admin }}</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
