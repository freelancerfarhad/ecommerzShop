@extends('Layout.front_app')
@section('frontend_content')
    
@include('components.frontend.header');

	<main id="main">
		<div class="container">
			<!--MAIN SLIDE-->
            @include('components.frontend.heroSlider');
			<!--BANNER-->
            @include('components.frontend.sliderBanner');
			<!--On Sale-->
            @include('components.frontend.onSale');
			<!--Latest Products-->
            @include('components.frontend.latestProduct');
			<!--Product Categories-->
            @include('components.frontend.excluveProducted');
		</div>

	</main>
    @include('components.frontend.footer');
 @endsection