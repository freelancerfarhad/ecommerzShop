@extends('Layout.front_app')
@section('frontend_content')
    
@include('components.frontend.header');

	<main id="main">
		<div class="container">
			<!--MAIN SLIDE-->
            @include('components.frontend.brandwiseproduct');
		</div>

	</main>
    @include('components.frontend.footer');
 @endsection