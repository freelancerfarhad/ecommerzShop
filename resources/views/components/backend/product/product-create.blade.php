
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Create</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{route('products')}}"class="float-end btn m-0 btn-danger">Back</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <section class="content">
        <form action="{{route('product.store')}}" method="post"enctype="multipart/form-data"id="save-form">
            @csrf
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Quick Informaction</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                <div class="form-group" data-select2-id="29">
                    <label>Brand <span style="color:red">*</span> </label>
                    <select class="form-control select2 select2-hidden-accessible"name="brand_id">
                      <option selected="selected" disabled>select brand</option>
                        @foreach ($brands as $item)
                        <option  value="{{$item->id}}">{{$item->brandName}}</option>
                        @endforeach
                    </select>
                    </div>

                        <div class="form-group" data-select2-id="29">
                            <label>Category <span style="color:red">*</span> </label>
                            <select class="form-control select2 select2-hidden-accessible" name="category_id" >
                            <option selected="selected" disabled>select Category</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->categoryName}}</option>
                                @endforeach
                            </select>
                        </div>
                  
                    <div class="form-group">
                      <label for="exampleInputPrice">Sale Price <span style="color:red">*</span></label>
                      <input type="text"name="price" class="form-control" id="exampleInputPrice" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">Discount: <span style="color:red">*</span> </label>
                        <div class="icheck-danger d-inline">
                            <label for="radioDanger1">No
                            </label>
                            <input type="radio" name="discount" checked="" id="radioDanger1"value="0">
                           
                          </div>
                          <div class="icheck-danger d-inline">
                            <label for="radioDanger2">Yes
                            </label>
                            <input type="radio" name="discount" id="radioDanger2"value="1">
                        
                          </div>    
                        </div>

                    <div class="form-group">
                        <label for="exampleInputPrice">Discount Price <span style="color:red">(optional)</span></label>
                        <input type="text" name="discount_price"class="form-control" id="exampleInputPrice" placeholder="Enter price">
                      </div>
                  
                      <div class="form-group">
                        <label for="exampleInputPrice">In stock <span style="color:red">*</span></label>
                        <input type="text" name="stock"class="form-control" id="exampleInputPrice" placeholder="Enter price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Product Ratting <span style="color:red">*</span></label>
                        <input type="text"name="star" class="form-control" id="exampleInputPrice" placeholder="Enter price">
                      </div>
                      <div class="form-group" data-select2-id="29">
                        <label>Product Remark </label>
                        <select name="remark" class="form-control select2 select2-hidden-accessible">
                            <option value=""readonly disabled>Select Product position</option>
                            <option value="popular">Popular</option>
                            <option value="sale">Sale</option>
                            <option value="new">New</option>
                            <option value="top">Top</option>
                            <option value="special">Special</option>
                            <option value="trending">Trending</option>
                        </select>
                    </div>
              </div>
              </div>

  
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- Form Element sizes -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Quick Informaction</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPrice">Title<span style="color:red">*</span></label>
                        <input type="text" name="title"class="form-control" id="exampleInputPrice" placeholder="Enter price">
                      </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPrice">short description<span style="color:red">*</span></label>
                        <input type="text" name="short_des" class="form-control" id="exampleInputPrice" placeholder="Enter price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Color<span style="color:red">*</span></label>
                        <input type="text" name="color" class="form-control" id="exampleInputPrice" placeholder="Enter price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Size<span style="color:red">*</span></label>
                        <input type="text"name="size"  class="form-control" id="exampleInputPrice" placeholder="Enter price">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Product Thumbnail<span style="color:red">*</span></label>
                        <img id="showImage"src="https://dummyimage.com/300x400/" width="100"height="100">
                        <input id="productImg" type="file"oninput="showImage.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="image"required>
                      </div>
                      <div class="card-footer">
                        <input type="checkbox" name="status" value="1"id="status"class="filled-in">
                                    <label for="status">Publish</label>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                      </div>
                    </div>
                <!-- /.card-body -->
              </div>

            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputPrice">multiple (4) Image Upload<span style="color:red">*</span></label>
                    <div class="row"id="preview_img"></div>
                    <input type="file" id="detailsImg1" class="form-control"name="detailsImg[]"multiple=""required></div>
                   </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputPrice">Long Description<span style="color:red">*</span></label>
                    <textarea name="logn_des" id="detailsDes" cols="30" rows="10"class="form-control"placeholder="Write Long Des..."></textarea>
                </div>
                   </div>
          </div>
        </div><!-- /.container-fluid -->
        </form>
      </section>
  </div>
  <!-- /.content-wrapper -->
  <script>
    $(document).ready(function(){
     $('#detailsImg1').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
     
    </script>

    