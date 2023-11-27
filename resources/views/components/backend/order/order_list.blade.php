
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
            <div class="card">
              <div class="card-header bg-primary">
                <h4 class="text-white">New Orders
                <a href="{{route('order.history')}}"class="btn btn-warning  float-right">Order History</a>
              </h4>
              </div>
              <div class="card-body">
                <table class="table" id="tableData">
                  <thead class="">
                  <tr class="bg-light">
                      <th>No</th>
                      <th>Order Date</th>
                      <th>Traking Number</th>
                      <th>Total Price</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="tableList">
                        @foreach ($orders as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                <td>{{$item->traking_no}}</td>
                                <td>{{$item->total_price}}</td>
                                <td>{{$item->payment_status == '0' ? 'Panding':'Complated'}}</td>
                                <td><a href="{{url('super-admin/order-view/'.$item->id)}}"class="btn btn-danger btn-sm">view</a></td>
                              
                            </tr>
                        @endforeach
                  </tbody>
              </table>
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
  
  <script>

    
    </script>
    