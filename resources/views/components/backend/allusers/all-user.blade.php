
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registration User List</h1>
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
                <h4 class="text-white">User List
                {{-- <a href="{{route('order.history')}}"class="btn btn-warning  float-right">Order History</a> --}}
              </h4>
              </div>
              <div class="card-body">
                <table class="table" id="tableData">
                  <thead class="">
                  <tr class="bg-light">
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone </th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="tableList">
                        @foreach ($users as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->name}} {{$item->lname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td><a href="{{url('super-admin/user-view/'.$item->id)}}"class="btn btn-danger btn-sm">view</a></td>
                              
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
    