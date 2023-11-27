@extends('Layout.app')
@section('content')
  
    @include('components.backend.header')
    @include('components.backend.sidenav')
    @include('components.backend.allusers.all-user')

    @include('components.backend.footer')
  
@endsection