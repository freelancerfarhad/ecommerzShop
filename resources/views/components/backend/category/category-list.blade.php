
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
            <li class="breadcrumb-item"><button data-toggle="modal" data-target="#create-modal" class="float-end btn m-0 btn-success">Create Category</button></li>
            
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
                <th>Category Image</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="tableList">

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

<script>

  CategorygetList();
  
  
  async function CategorygetList() {
  
      // showLoader();
      let res = await axios.get("/super-admin/category-list");
      // hideLoader();
  
      let tableList =$("#tableList");
      let tableData =$("#tableData");
  
      tableData.DataTable().destroy();
      tableList.empty();
  
  
      res.data['data'].forEach(function(item,index){
          let row = 
          `<tr>
              <td>${index+1}</td>
              <td><img src="/${item['categoryImg']}" width="20"></td>
              <td>${item['categoryName']}</td>
              <td>
                 <button data-path="/${item['categoryImg']}"  data-id="${item['id']}"class="btn EditBtn btn-outline-success">edit</button> 
                 <button data-path="/${item['categoryImg']}"  data-id="${item['id']}"class="btn DeleteBtn  btn-outline-danger">delete</button> 
              </td>
           </tr>`
           tableList.append(row);
      });
      $('.EditBtn').on('click', async function () {
             let id= $(this).data('id');
             let filePath= $(this).data('path');
             await FillUpUpdateForm(id,filePath);
             $("#update-modal").modal('show');
      })
  
      $('.DeleteBtn').on('click',function () {
          let id= $(this).data('id');
          let path= $(this).data('path');
  
          $("#deleted-modal").modal('show');
          $("#deleteID").val(id);
          $("#deleteFilePath").val(path)
  
      })
   
  
      new DataTable('#tableData',{
          order:[[0,'asc']],
          lengthMenu:[5,10,15,20,30]
      });
   
  
      
  
  }
  
  
  </script>
  