<div class="wrap-show-advance-info-box style-1">
    <h3 class="title-box">Product Categories</h3>
    <div class="wrap-top-banner">
        <a href="#" class="link-banner banner-effect-2">
            <figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
        </a>
    </div>
    <div class="wrap-products">
        <div class="wrap-product-tab tab-style-1">
            <div class="tab-control">
                <a href="#all" class="tab-control-item active">All</a>
                @foreach ($categorys as $category)
                <a href="#category{{$category->id}}" class="tab-control-item">{{$category->categoryName}}</a>
                @endforeach
               
                {{-- <a href="#fashion_1b" class="tab-control-item">Watch</a>
                <a href="#fashion_1c" class="tab-control-item">Laptop</a>
                <a href="#fashion_1d" class="tab-control-item">Tablet</a> --}}
            </div>
            <div class="tab-contents">
                
                <div class="tab-content-item active" id="all">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

                        @foreach ($products as $product)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{url('product/details/'.$product->id)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{asset("uploads/product/$product->image")}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">{{$product->remark}}</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$product->title}}</span></a>
                                <div class="wrap-price">
                                    @if ($product->discount_price == NULL)
                                    <span class="product-price">${{$product->price}}</span>
                                    @else
                                    <span class="product-price">{{round($product->discount_price)}}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                @foreach ($categorys as $category)

                <div class="tab-content-item" id="category{{$category->id}}">
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                        @php
                            $catwiseproduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                        @endphp
                        @forelse ($catwiseproduct as $product)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{asset("uploads/product/$product->image")}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">{{$product->remark}}</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$product->title}}</span></a>
                                <div class="wrap-price">
                                    @if ($product->discount_price == NULL)
                                    <span class="product-price">${{$product->price}}</span>
                                    @else
                                    <span class="product-price">{{round($product->discount_price)}}%</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                            <h4 class="text-danger"style="padding:28px">Products Not Fuond !</h4>
                        @endforelse
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>		