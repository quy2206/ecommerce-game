@extends('admin.layout.master')
@section('title')
    <h1 class="m-0">{{ $title }}</h1>
@endsection
@section('content')
    @include('admin.promotion._search')
    @include('admin.layout.alert')
    @include('admin.promotion._table')
@endsection
