@extends('Layout.front_app')
@section('frontend_content')
    
@include('components.frontend.header');

	<main id="main">
		<div class="container">
            @include('components.frontend.wishlist');
            @include('components.frontend.relatedproduct');
		</div>
	</main>
    @include('components.frontend.footer');
 @endsection
 
 @section('scripts')


<script>
$(document).ready(function () {

$('.delete-wish-item').click(function(e){

    e.preventDefault();

    var product_id= $(this).closest('.products-data').find('.product_id').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method:"POST",
        url:"/remove-product-wish",
        data:{
            'product_id':product_id,
        },
        success:function(response){
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: response.status,
                showConfirmButton: false,
                timer: 1500
                });
                wishload();
                window.location.reload();
          
        }
    });

});
//----removed cart end------//
    $('.changeQTYBtn').click(function(e){
        e.preventDefault();

        var product_id= $(this).closest('.products-data').find('.product_id').val();
        var qty= $(this).closest('.products-data').find('.qty-input').val();
        data={
            'product_id':product_id,
            'qty':qty,
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
        method:"POST",
        url:"/update-cart",
        data:data,
        success:function(response){
            window.location.reload();
          
        }
    });

    });

});

</script>
@endsection