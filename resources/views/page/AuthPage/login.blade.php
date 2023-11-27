@extends('Layout.front_app')
@section('frontend_content')
    
@include('components.frontend.header');

	<main id="main">
		<div class="container">
            @include('components.auth.login-form');
	</main>

    @include('components.frontend.footer');
 @endsection