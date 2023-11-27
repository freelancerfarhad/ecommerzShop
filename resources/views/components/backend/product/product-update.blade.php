
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
        <form action="{{route('product.update',$products->id)}}" method="post"enctype="multipart/form-data"id="save-form">
            @csrf
            @method('put')
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
                      @foreach ($brands as $brand)
                      <option value="{{$brand->id}}"{{$brand->id==$products->brand_id?'selected':''}}> {{ $brand->brandName }} </option>
                  @endforeach
                    </select>
                    </div>

                        <div class="form-group" data-select2-id="29">
                            <label>Category <span style="color:red">*</span> </label>
                            <select class="form-control select2 select2-hidden-accessible" name="category_id" >
                            <option selected="selected" disabled>select Category</option>
                            @foreach ($category as $category)
                            <option value="{{$category->id}}"{{$category->id==$products->category_id?'selected':''}}> {{ $category->categoryName }} </option>
                        @endforeach
                            </select>
                        </div>
                  
                    <div class="form-group">
                      <label for="exampleInputPrice">Sale Price <span style="color:red">*</span></label>
                      <input type="text"name="price" class="form-control" id="exampleInputPrice" value="{{$products->price}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">Discount: <span style="color:red">*</span> </label>
                        @if ($products->discount)
                        <div class="icheck-danger d-inline">
                            <label for="radioDanger1">Yes
                            </label>
                            <input type="radio" name="discount" checked="" id="radioDanger1"value="1">  
                          </div>
                          <div class="icheck-danger d-inline">
                            <label for="radioDanger2">No
                            </label>
                            <input type="radio" name="discount" id="radioDanger2"value="0">
                        
                          </div> 
                          @else
                          <div class="icheck-danger d-inline">
                            <label for="radioDanger2">Yes
                            </label>
                            <input type="radio" name="discount" id="radioDanger2"value="1">
                        
                          </div> 
                          <div class="icheck-danger d-inline">
                            <label for="radioDanger2">No
                            </label>
                            <input type="radio" name="discount"checked="" id="radioDanger2"value="0">      
                          </div> 
                        @endif

   
                        </div>

                    <div class="form-group">
                        <label for="exampleInputPrice">Discount Price <span style="color:red">(optional)</span></label>
                        <input type="text" name="discount_price"class="form-control" id="exampleInputPrice" value="{{$products->discount_price}}">
                      </div>
                  
                      <div class="form-group">
                        <label for="exampleInputPrice">In stock <span style="color:red">*</span></label>
                        <input type="text" name="stock"class="form-control" id="exampleInputPrice" value="{{$products->stock}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Product Ratting <span style="color:red">*</span></label>
                        <input type="text"name="star" class="form-control" id="exampleInputPrice" value="{{$products->star}}">
                      </div>
                        <div class="form-group" data-select2-id="29">
                        <label>Product Remark </label>
                        <select name="remark" class="form-control select2 select2-hidden-accessible">
                            <option value=""readonly disabled>Select Product position</option>
                            <option value="popular">Popular</option>
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
                        <input type="text" name="title"class="form-control" id="exampleInputPrice" value="{{$products->title}}">
                      </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPrice">short description<span style="color:red">*</span></label>
                        <input type="text" name="short_des" class="form-control" id="exampleInputPrice" value="{{$products->short_des}}">
                      </div>

                    <div class="form-group">
                      <label for="exampleInputPrice">Color<span style="color:red">*</span></label>
                      <input type="text" name="color" class="form-control" id="exampleInputPrice" value="{{$products->productdetail->color}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPrice">Size<span style="color:red">*</span></label>
                      <input type="text"name="size"  class="form-control" id="exampleInputPrice"value="{{$products->productdetail->size}}">
                    </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Product Thumbnail<span style="color:red">*</span></label>
                        @if ($products->image)
                        <img id="showImage"src="{{asset("uploads/product/$products->image")}}" width="100"height="100">
                            @else
                            <img id="showImage"src="https://dummyimage.com/300x400/" width="100"height="100">
                        @endif
                        <input id="productImg" type="file"oninput="showImage.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="image">
                      </div>
                      <div class="card-footer">
                        @if ($products->status==1)
                        <input type="checkbox"checked="" name="status" value="1"id="status"class="filled-in">
                        @else
                        <input type="checkbox" name="status" value="1"id="status"class="filled-in">
                            
                        @endif
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
                    <label for="exampleInputPrice">Long Description<span style="color:red">*</span></label>
                    <textarea name="logn_des" id="detailsDes" cols="30" rows="10"class="form-control">
                        {{$products->logn_des}}
                    </textarea>
                </div>
                   </div>
          </div>
        </div><!-- /.container-fluid -->
        </form>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('productimagemultiple',$products->id)}}" method="post"enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">

                        <label for="exampleInputPrice">multiple (4) Image Upload<span style="color:red">*</span></label>
                        <div class="row clearfix">
                            @foreach ($details as $multiimage)
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header ">
                                    <img src="{{asset("uploads/product/details/$multiimage->detailsImg")}}" width="200"height="120">
                                </div>
                                <div class="body">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <a class="multix"href="{{route('multipleimgdeletebysingle',$multiimage->id)}}"style="margin-left: 194px;color:black;background:red;padding: 2px 6px;  text-decoration: none;    border-radius: 3px;">X</a>
                                            <input type="file" id="multiImg" class="form-control"name="detailsImg[{{$multiimage->id}}]"multiple="">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-2 ml-5 waves-effect"> Img Update</button>
                                    </div>
                                </div>
                            </div>
                            </div>    
                            @endforeach
                        </div></div>
                </form>
                       </div>
              </div>
        </div>

      </section>
  </div>
  <!-- /.content-wrapper -->
  <script>
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
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

    