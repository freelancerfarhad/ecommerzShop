@extends('Layout.front_app')
@section('frontend_content')
    
@include('components.frontend.header');

	<main id="main">
		<div class="container">
			<!--MAIN SLIDE-->
            @include('components.frontend.productdetails');
		</div>

	</main>
    @include('components.frontend.footer');
 @endsection
 @section('scripts')
     

<script>
    $(document).ready(function () {

        $('.AddToCart').click(function(e){

                e.preventDefault();

                var product_id= $(this).closest('.product-data').find('.product_id').val();
                var qty= $(this).closest('.product-data').find('.product-quatity').val();
                var color= $(this).closest('.product-data').find('.color').val();
                var size= $(this).closest('.product-data').find('.size').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method:"POST",
                    url:"/add-to-cart",
                    data:{
                        'product_id':product_id,
                        'qty':qty,
                        'color':color,
                        'size':size,
                    },
                    success:function(response){
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(response.status);
                        cartload();
                    }
                });

        });
        // wishlist
        $('.AddWishList').click(function(e){

            e.preventDefault();

            var product_id= $(this).closest('.product-data').find('.product_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method:"POST",
                url:"/add-to-wish",
                data:{
                    'product_id':product_id,
                },
                success:function(response){
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(response.status);
                    wishload();
                }
            });

            });
        
    });

</script>
@endsection