
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{route('cartlist')}}" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form action="{{route('place-order')}}" method="Post" name="frm-billing">
                @csrf
            <div class="wrap-address-billing">
                <h3 class="box-title">Billing Address</h3>
              
                    <p class="row-in-form">
                        <label for="fname">first name<span>*</span></label>
                        <input id="fname" type="text" name="fname" value="{{Auth::user()->name}}" placeholder="Your name"required>
                    </p>
                    <p class="row-in-form">
                        <label for="lname">last name<span>*</span></label>
                        <input id="lname" type="text" name="lname" value="{{Auth::user()->lname}}" placeholder="Your last name"required>
                    </p>
                    <p class="row-in-form">
                        <label for="email">Email Addreess:</label>
                        <input id="email" type="email" name="email" value="{{Auth::user()->email}}" placeholder="Type your email"required>
                    </p>
                    <p class="row-in-form">
                        <label for="phone">Phone number<span>*</span></label>
                        <input id="phone" type="number" name="phone" value="{{Auth::user()->phone}}" placeholder="10 digits format"required>
                    </p>
                    <p class="row-in-form">
                        <label for="add1">Address1:</label>
                        <input id="add1" type="text" name="address1" value="{{Auth::user()->address1}}" placeholder="Street at apartment number"required>
                    </p>     
                       <p class="row-in-form">
                        <label for="add2">Address2:</label>
                        <input id="add2" type="text" name="address2" value="{{Auth::user()->address2}}" placeholder="Street at apartment number"required>
                    </p>
                  
                    <p class="row-in-form">
                        <label for="zip-code">Postcode / ZIP:</label>
                        <input id="zip-code" type="number" name="postcode" value="{{Auth::user()->postcode}}" placeholder="Your postal code"required>
                    </p>
                    <p class="row-in-form">
                        <label for="city">Town / City<span>*</span></label>
                        <input id="city" type="text" name="city" value="{{Auth::user()->city}}" placeholder="City name"required>
                    </p>  <p class="row-in-form">
                        <label for="state">State<span>*</span></label>
                        <input id="state" type="text" name="state" value="{{Auth::user()->state}}" placeholder="State name"required>
                    </p>
                    <p class="row-in-form">
                        <label for="country">Country<span>*</span></label>
                        <input id="country" type="text" name="country" value="{{Auth::user()->country}}" placeholder="United States"required>
                    </p>
              
            </div>

            <div class="summary summary-checkout">
                <div class="summary-item shipping-method">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Product Details</td>
                            <td>Qty</td>
                            <td>Price</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                             $total = 0;
                        @endphp
                        @forelse ($products as $item)
                            <tr>
                                <td>{{$item->product->title}}</td>
                                <td>{{$item->qty}}</td>
                                <td>${{$item->price}}</td>
                            </tr>
                            @php
                                $total += $item->price*$item->qty;
                            @endphp
                            @empty
                            <h6 class="text-danger"><b>No Product in Cart !</b></h6>
                        @endforelse
                    </tbody>
                </table>
                    {{-- 
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed $50.00</span></p>
                    <h4 class="title-box">Discount Codes</h4>
                    <p class="row-in-form">
                        <label for="coupon-code">Enter Your Coupon code:</label>
                        <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
                    </p>
                    <a href="#" class="btn btn-small">Apply</a>
                 --}}
            </div>
       
                <div class="summary-item payment-method pull-right">
                    <h4 class="title-box">Payment Method</h4>
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="bank" type="radio">
                            <span>Cash On Delevery</span>
                            <span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="visa" type="radio">
                            <span>Bikash</span>
                            <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
                            <span>Stripe</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>
                    </div>
             
                    <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{$total}}</span></p>
                    @if($products->count() >0)
                    <input type="submit"class="btn btn-medium" value="Place order now">
                    @endif
                </div>
                
            </div>

        </form>

        </div><!--end main content area-->
