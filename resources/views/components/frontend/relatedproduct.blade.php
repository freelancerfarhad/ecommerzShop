<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="wrap-show-advance-info-box style-1 box-in-site">
        <h3 class="title-box">Related Products</h3>
        <div class="wrap-products">
            <div class="products slide-carousel owl-carousel style-nav-1 equal-container owl-loaded owl-drag" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive="{&quot;0&quot;:{&quot;items&quot;:&quot;1&quot;},&quot;480&quot;:{&quot;items&quot;:&quot;2&quot;},&quot;768&quot;:{&quot;items&quot;:&quot;3&quot;},&quot;992&quot;:{&quot;items&quot;:&quot;3&quot;},&quot;1200&quot;:{&quot;items&quot;:&quot;5&quot;}}">

            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1869px;">
                @php $product = DB::table('products')->where('status',1)->get();   @endphp
                @foreach ($product as $item)
                    
                    <div class="owl-item active" style="width: 233.6px;">
                    <div class="product product-style-2 equal-elem " style="height: 316px;">
                        <div class="product-thumnail">
                            <a href="{{url('product/details/'.$item->id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{asset("uploads/product/$item->image")}}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">{{$item->remark}}</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="{{url('product/details/'.$item->id)}}" class="product-name"><span>{{$item->title}}</span></a>
                            <div class="wrap-price">
                                @if ($item->discount_price == NULL)
                                <span class="product-price">${{$item->price}}</span>
                                @else
                                <span class="product-price">
                                <del class="product-price">${{$item->price}} </del>-
                                 ${{round($item->discount_price)}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
        </div>
    </div>
    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i class="fa fa-angle-left" aria-hidden="true"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
    </div>
    </div>
        </div><!--End wrap-products-->
    </div>
</div>