@extends('layouts.barberApp')
@section('content')
   <x-reload-component />
    @include('catalogo.showBanner')
    @include('catalogo.showInformation')
    @include('catalogo.showService')
    <x-barber-blog />
    <x-services-barber />
    @include('catalogo.shopImg')
    <x-footer-component />
@endsection
