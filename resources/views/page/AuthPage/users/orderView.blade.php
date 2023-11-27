@extends('Layout.front_app')
@section('E-Mart Profile')
    
@section('frontend_content')
    
@include('components.frontend.header');

	<main id="main">
		<div class="container">
			<!--MAIN SLIDE-->
            @include('components.frontend.profile.order-view');
		</div>

	</main>
    @include('components.frontend.footer');
 @endsection
{{-- <a href="/logout">Logout</a> --}}
