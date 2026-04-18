@extends('layouts.barberApp')
@section('content')
    <x-reload-component />
    <x-blog-banner />
    @include('blog.show')
    <x-footer-component />
@endsection
