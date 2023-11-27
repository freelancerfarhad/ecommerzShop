
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Order List</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">
            <div class="row">
                <div class="col-md-6">
                    <h4>Shipping Details</h4>
                    <label for="">First Name</label>
                    <div class="borders">{{$orderItems->fname}} {{$orderItems->lname}}</div>
                    <label for="">Email</label>
                    <div class="borders">{{$orderItems->fname}} {{$orderItems->email}}</div>
                    <label for="">Contact Number</label>
                    <div class="borders">{{$orderItems->phone}}</div>
                    <label for="">Address</label>
                    <div class="borders">
                        {{$orderItems->address1}},
                         {{$orderItems->address2}},
                         {{$orderItems->city}},
                         {{$orderItems->state}},
                         {{$orderItems->country}},
                        </div>
                        <label for="">Zip-Code</label>
                        <div class="borders">{{$orderItems->postcode}}</div>
                        <div class="borders">
                            <a href="{{route('order')}}"class="btn btn-danger float-right">Back</a>
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
                    <h4>Grand Total : <b>${{$orderItems->total_price}}</b></h4>
                    <form action="{{url('super-admin/order-update/'.$orderItems->id)}}"method="post">
                      @csrf
                      @method('PUT')
                        <label for="payment_status">Status</label>
                        <select name="payment_status" id="payment_status"class="form-control">
                            <option {{$orderItems->payment_status == '0' ? 'selected':''}} value="0">Panding</option>
                            <option {{$orderItems->payment_status == '1' ? 'selected':''}} value="1">Complated</option>
                        </select>
                        <input type="submit"class="mt-3 btn btn-primary float-right" value="Update">
                    </form>

                </div>
            </div>
          </div>
  
          <!-- /.col -->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    
@section('scripts')
   <script>
    @if(Session::has('success'))
      toastr.options={
        "closeButton":true,"progressBar":true,
      }
      toastr.success("{{Session::get('success')}}")
    @endif
    </script> 
@endsection
