@extends('layouts.admin')
@section('title') Main @endsection
@section('content')
<div>
    <x-alert type="info" message="Info alert"></x-alert>
    <x-alert type="warning" message="Warning alert"></x-alert>
    <x-alert type="danger" message="Danger alert"></x-alert>
    <x-alert type="success" message="Success alert"></x-alert>
</div>
@endsection
