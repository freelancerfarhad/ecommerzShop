@extends('Layout.front_app')
@section('E-Mart Thank-You')
    

@section('frontend_content')
    
@include('components.frontend.header');

	<main id="main">
		<div class="container">
			<!--MAIN SLIDE-->
            @include('components.frontend.thank-you');
		</div>

	</main>
    @include('components.frontend.footer');
 @endsection
 @section('scripts')
     

<script>


</script>
@endsection