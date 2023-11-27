<div class="content">   
    <style>
        .content {
          padding-top: 40px;
          padding-bottom: 40px;
        }
        .icon-stat {
            display: block;
            overflow: hidden;
            position: relative;
            padding: 7px;
            margin-bottom: 3px;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;
            background: #ff2832;
            color: white;
        }
     
        .icon-stat-value {
            display: block;
            font-size: 28px;
            font-weight: 600;
        }
        .icon-stat a{
            color:white;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">    
                <div class="row">
                    <div class="col-md-12 col-sm-12">    
                        <div class="icon-stat">    
                              <span class="icon-stat-value">Profiles</span>
                        </div>    
                      </div>  
                      <div class="col-md-12 col-sm-12">    
                        <div class="icon-stat">    
                            <a href="{{route('order-list')}}"><span class="icon-stat-value">Order</span></a>
                        </div>    
                      </div> 
                      <div class="col-md-12 col-sm-12">    
                        <div class="icon-stat">    
                              <span class="icon-stat-value">Profiles</span>
                        </div>    
                      </div> 
                      <div class="col-md-12 col-sm-12">    
                        <div class="icon-stat">    
                              <span class="icon-stat-value">Profiles</span>
                        </div>    
                      </div> 
                      <div class="col-md-12 col-sm-12">    
                        <div class="icon-stat">    
                            <a href="{{route('logout')}}">  <span class="icon-stat-value">Log-Out</span></a>
                        </div>    
                      </div> 
                </div>
            </div>    
            <div class="col-md-9 col-sm-9">    
                <div class="row">
             
                    <div class="col-md-6">
                        <h4>Shipping Details</h4>
                        <label for="">First Name</label>
                        <div class="border">{{$orderItems->fname}} {{$orderItems->lname}}</div>
                        <label for="">Email</label>
                        <div class="border">{{$orderItems->fname}} {{$orderItems->email}}</div>
                        <label for="">Contact Number</label>
                        <div class="border">{{$orderItems->phone}}</div>
                        <label for="">Address</label>
                        <div class="border">
                            {{$orderItems->address1}},
                             {{$orderItems->address2}},
                             {{$orderItems->city}},
                             {{$orderItems->state}},
                             {{$orderItems->country}},
                            </div>
                            <label for="">Zip-Code</label>
                            <div class="border">{{$orderItems->postcode}}</div>
                            <div class="border">
                                <a href="{{route('order-list')}}"class="btn btn-danger pull-right">Back</a>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <h4>Order Details</h4>
                        <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">image</th>
                                <th scope="col">price</th>
                                <th scope="col">Total </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems->orderItem as $item)
                                    <tr>
                                        <td>{{$item->product->title}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td><img src="{{asset('uploads/product/'.$item->product->image)}}"width="40"height="40" alt=""></td>
                                    <td>{{$item->sale_price}}</td>
                                    <td>${{$item->qty*$item->sale_price}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h4>Grand Total</h4>
                        <div class="alert alert-danger">${{$orderItems->total_price}}</div>
                    </div>
                </div>
            </div>
          </div>        
    </div>    
</div>