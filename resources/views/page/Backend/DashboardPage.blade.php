@extends('Layout.app')
@section('content')
  
    @include('components.backend.loader')
    @include('components.backend.header')
    @include('components.backend.sidenav')
    @include('components.backend.summary')
    @include('components.backend.footer')
  
@endsection