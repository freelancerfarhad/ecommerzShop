

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
                        <div class="quantity mr-4">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity"class="qty-input" value="" data-max="120" pattern="[0-9]*" >	
                                <button class="btn btn-increase changeQTYBtn" href="#"></button>
                                <button class="btn btn-reduce changeQTYBtn" href="#"></button>
                            </div>
                        </div>
                        <div class="delete ml-5">
                            <a href="{{url('product/details/'.$item->product_id)}}"class="btn btn-danger btn-view "style="margin-left:5px"title="{{$item->title}}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"style="    padding: 4px 7px;color:white;"></i>
                            </a>
                        </div>
                        <div class="delete ml-5">
                            <button class="btn btn-danger btn-delete delete-wish-item"style="margin-left:5px">
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
    
            
    @else
    <div class="alert alert-danger">
        <h1>Your <i class="fa fa-shopping-cart"></i> Wish-List Empty !</h1>
    <a href="{{route('all-shop')}}"class="btn btn-primary pull-right"style="margin-top:-34px;">continue shopping</a>
    </div>
    @endif
         
       
    
        </div><!--end main content area-->
    