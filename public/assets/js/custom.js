$(document).ready(function () {
    cartload();
    wishload();
    wishloads();
});

function cartload()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/load-cart-data',
        method: "GET",
        success: function (response) {
            $('.item-count').html('');
            $('.item-count').html(response.counts);
         
        }
    });
}
function wishload()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/load-wish-data',
        method: "GET",
        success: function (response) {
            $('.item-counts').html('');
            $('.item-counts').html(response.counts);
         
        }
    });
}

   
function wishloads()
{
    let left_value = $('#input_left').val();
    let right_value = $('#input_right').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:"/search-product",
        method:"GET",
        data:{left_value:left_value, right_value:right_value},
        success:function(res){
           $('.search-result').html(res);
        // console.log(res);
        }
    });
}
