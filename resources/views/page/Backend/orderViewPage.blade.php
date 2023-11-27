@extends('Layout.app')
@section('content')
  
    @include('components.backend.header')
    @include('components.backend.sidenav')
    @include('components.backend.order.order_view')

    @include('components.backend.footer')
  
@endsection