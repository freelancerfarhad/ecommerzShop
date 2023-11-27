

    <div class=" main-content-area ">
@if($data->count() >0)
        <div class="wrap-iten-in-cart ">
            <h3 class="box-title">Products Name</h3>
            <ul class="products-cart ">
                @php  $total = 0; @endphp
                @forelse ($data as $item)
              
                <li class="pr-cart-item  products-data">
                    <div class="product-image">
                        <figure><img src="{{'uploads/product/'.$item->product->image}}" alt=""></figure>
                    </div>
                    <div class="product-name">
                        <input type="hidden" value="{{$item->product_id}}"class="product_id">
                        <a class="link-to-product" href="#">{{$item->product->title}}</a>
                    </div>
                    @if ($item->product->discount_price == NULL)
                    <div class="price-field produtc-price"><p class="price">{{$item->product->price}}</p></div>
                    @else
                    <div class="price-field produtc-price"><p class="price">{{$item->product->discount_price}}</p></div>
                    @endif
                    @if($item->product->stock >= $item->qty)
                    <div class="quantity">
                        <div class="quantity-input">
                            <input type="text" name="product-quatity"class="qty-input" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >	
                            <button class="btn btn-increase changeQTYBtn" href="#"></button>
                            <button class="btn btn-reduce changeQTYBtn" href="#"></button>
                        </div>
                    </div>
                 
                    <div class="price-field sub-total"><p class="price">{{$item->product->discount_price * $item->qty}} </p></div>
                    @php  $total += $item->product->discount_price * $item->qty; @endphp
                    @else 
                    <h6 style="color:red">Out of Stock</h6>
                    @endif
                    <div class="delete">
                        <button class="btn btn-danger btn-delete delete-cart-item">
                            {{-- <span>Delete from your cart</span> --}}
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </button>
                    </div>
                </li>
     
                @empty
                <div class="alert alert-danger">
                    <h4>Cart Item Not Found..Please Add to cart your Product !</h4>

                </div>
           
                @endforelse
            </ul>
        </div>

        <div class="summary">
            <div class="row">
                <div class="col-md-6">
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{$total}}</b></p>
                        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                        <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{$total}}</b></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="checkout-info"style=" margin-top: 112px;">
                        <label class="checkbox-field">
                            <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                        </label>
                        <a class="btn btn-checkout" href="{{route('checkout')}}">Check out</a>
                    </div>
                </div>
            </div>


        </div>
@else
<div class="alert alert-danger">
    <h1>Your <i class="fa fa-shopping-cart"></i> Cart Empty !</h1>
<a href="{{route('all-shop')}}"class="btn btn-primary pull-right"style="margin-top:-34px;">continue shopping</a>
</div>
@endif
     
   

    </div><!--end main content area-->
