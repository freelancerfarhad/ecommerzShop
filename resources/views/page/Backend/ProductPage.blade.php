@extends('Layout.app')
@section('content')
  
    @include('components.backend.header')
    @include('components.backend.sidenav')
    @include('components.backend.product.product-list')

    @include('components.backend.footer')
  
@endsection