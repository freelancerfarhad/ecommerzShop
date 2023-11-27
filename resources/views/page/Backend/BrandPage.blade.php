@extends('Layout.app')
@section('content')
  
    @include('components.backend.header')
    @include('components.backend.sidenav')
    @include('components.backend.brand.brand_list')
    @include('components.backend.brand.brand-delete')
    @include('components.backend.brand.brand-create')
    @include('components.backend.brand.brand-update')
    @include('components.backend.footer')
  
@endsection