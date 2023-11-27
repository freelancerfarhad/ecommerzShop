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
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Traking Number</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key=>$item)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$item->traking_no}}</td>
                            <td>{{$item->total_price}}</td>
                            <td>{{$item->payment_status == '0' ? 'Panding':'Complated'}}</td>
                            <td><a href="{{url('order-view/'.$item->id)}}"class="btn btn-danger btn-sm">view</a></td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
          </div>        
    </div>    
</div>