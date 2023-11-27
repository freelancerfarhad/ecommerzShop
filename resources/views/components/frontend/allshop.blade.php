<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
			
    <div class="banner-shop">
        <a href="#" class="banner-link">
            <figure><img src="{{asset('assets/images/shop-banner.jpg')}}" alt=""></figure>
        </a>
    </div>

    <div class="wrap-shop-control">

        <h1 class="shop-title">Digital &amp; Electronics</h1>

        <div class="wrap-right">

            <div class="sort-item orderby ">
                <select name="orderby" class="use-chosen" style="display: none;">
                    <option value="menu_order" selected="selected">Default sorting</option>
                    <option value="popularity">Sort by popularity</option>
                    <option value="rating">Sort by average rating</option>
                    <option value="date">Sort by newness</option>
                    <option value="price">Sort by price: low to high</option>
                    <option value="price-desc">Sort by price: high to low</option>
                </select>
            </div>



            <div class="change-display-mode">
                <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
            </div>

        </div>

    </div><!--end wrap shop control-->

{{-- @if($products->count() >0) --}}
    <div class="row ">

        <ul class="product-list grid-products grid-producted equal-container">
    
    @forelse ($all_products as $item)
    
            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                <div class="product product-style-3 equal-elem " style="height: 388px;">
                    <div class="product-thumnail">
                        <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="{{asset('uploads/product/'.$item->image)}}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{$item->title}}</span></a>
                        <div class="wrap-price"><span class="product-price">${{$item->price}}</span></div>
                        <a href="#" class="btn add-to-cart">Add To Cart</a>
                    </div>
                </div>
            </li>
            @empty
            <h3>Product Not Found</h3>
            @endforelse
        </ul>
    
    </div>
    {{-- @else
    <h5>Product Not Found</h5>
    @endif --}}
</div><!--end main products area-->