@extends('Layout.app')
@section('content')
  
    @include('components.backend.header')
    @include('components.backend.sidenav')
    @include('components.backend.category.category-list')
    @include('components.backend.category.category-delete')
    @include('components.backend.category.category-create')
    @include('components.backend.category.category-update')
    @include('components.backend.footer')
  
@endsection