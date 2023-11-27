
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard v2</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{route('product.create')}}"class="float-end btn m-0 btn-success">Create Product</a></li>
            
          </ol>
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
          <table class="table" id="tableData">
            <thead class="">
            <tr class="bg-light">
              <th>No</th>
              <th>Image</th>
              <th>Name</th>
              <th>price</th>
              <th>Stock</th>
              <th>Discount</th>
              <th>Brand</th>
              <th>Category</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody id="tableList">
              @foreach ($products as $key=>$item)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td> <img src='{{asset("uploads/product/$item->image")}}' alt="Img"width="50"height="50"></td>
                    <td>{{Str::limit($item->title,20)}}</td>
                    <td>${{$item->price}} </td>
                    <td>{{$item->stock}}</td>

                  <td>{{$item->discount}}
                  </td>
                  <td>{{$item->brand->brandName}}</td>
                  <td>{{$item->category->categoryName}}</td>
                  <td>
                                        
                    <a href="{{route('product.productidedit',$item->id)}}"class="btn btn-info  waves-effect"title="Edit Product">
                      <i class="far fa-edit"></i>
                    </a>
                    <button class="btn btn-danger waves-effect"type="button"onclick="deleteProduct({{$item->id}})">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                    <form id="delete-form-{{$item->id}}" action="{{route('product.delete',$item->id)}}" method="post"style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                @if ($item->status==1)
                <a href="{{route('statusInactive',$item->id)}}"class="btn btn-danger  waves-effect"title="Status Inactive">
                    <i class="fa-solid fa-arrow-down"></i>
                </a>
                @else
                <a href="{{route('statusActive',$item->id)}}"class="btn btn-info  waves-effect"title="Status Active">
                    <i class="fa-solid fa-arrow-up"></i>
                </a>
                @endif
                
                </td>
                  </tr>
              @endforeach
            </tbody>
        </table>
        </div>

        <!-- /.col -->
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
  function deleteProduct(id){
       
              const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
              },
              buttonsStyling: false
              })

              swalWithBootstrapButtons.fire({
              title: 'Are you sure to Product deleted ?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              reverseButtons: true
              }).then((result) => {
              if (result.isConfirmed) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
              } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
              ) {
                  swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your Data  is safe :)',
                  'error'
                  )
              }
              })
  }
</script>
<script>

  
      new DataTable('#tableData',{
          order:[[0,'asc']],
          lengthMenu:[5,10,15,20,30]
      });
   

  
  </script>
  