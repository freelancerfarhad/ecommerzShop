
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">single user Details</h1>
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
                <div class="col-md-4">
                    <label for="">Auth</label>
                    <div class="border text-white bg-green p-1">{{$userView->role == '0' ? 'User':'Admin'}}</div>
                    <label for="">Email</label>
                    <div class="border"> {{$userView->email}}</div>
                
                    <label for="">Address2</label>
                    <div class="border">{{$userView->address2}}</div>
                        <label for="">Country</label>
                        <div class="border">{{$userView->country}}</div>
                   
                </div><!---col-end--->

                <div class="col-md-4">
                    <label for="">First Name</label>
                    <div class="border"> {{$userView->lname}}</div>
                    <label for="">Contact Number</label>
                    <div class="border">{{$userView->phone}}</div>
                    <label for="">City</label>
                    <div class="border">{{$userView->city}}</div>
                    <label for="">Zip-Code</label>
                    <div class="border">{{$userView->postcode}}</div>
                </div><!---end col---->

                <div class="col-md-4">
                    <label for="">First Name</label>
                    <div class="border">{{$userView->name}} {{$userView->lname}}</div>
                    <label for="">Address1</label>
                    <div class="border">{{$userView->address1}} </div>
                    <label for="">State</label>
                    <div class="border">{{$userView->state}} </div>
                    <div class="border">
                        <a href="{{route('all-user')}}"class="btn btn-danger mt-5 float-right">Back</a>
                    </div>
                </div><!---end col---->
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
