
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sliders Create</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{route('slider')}}"class="float-end btn m-0 btn-danger">Back</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  
    <section class="content">
        <form action="{{route('slider.update',$sliders->id)}}" method="post"enctype="multipart/form-data"id="save-form">
            @csrf
            @method('put')
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Quick Informaction</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputPrice">Slider Title <span style="color:red">*</span></label>
                        <input type="text"name="title" class="form-control" id="exampleInputPrice" value="{{$sliders->title}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Slider Short-des <span style="color:red">*</span></label>
                        <input type="text"name="short_des" class="form-control" id="exampleInputPrice" value="{{$sliders->short_des}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPrice">Slider Price <span style="color:red">*</span></label>
                        <input type="text"name="price" class="form-control" id="exampleInputPrice" value="{{$sliders->price}} ">
                      </div>
                      <div class="form-group" data-select2-id="29">
                        <label>Brand <span style="color:red">*</span> </label>
                        <select class="form-control select2 select2-hidden-accessible"name="product_id">
                          <option selected="selected" disabled>select brand</option>
                          @foreach ($Products as $products)
                          <option value="{{$products->id}}"{{$products->id==$sliders->product_id?'selected':''}}> {{ $products->title }} </option>
                      @endforeach
                        </select>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">Slider Banner<span style="color:red">*</span></label>
                        @if ($sliders->image)
                        <img id="showImage"src="{{asset("uploads/slider/$sliders->image")}}" width="100"height="100">
                            @else
                            <img id="showImage"src="https://dummyimage.com/300x400/" width="100"height="100">
                        @endif
                        <input id="sliderImg" type="file"oninput="showImage.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="image">
                      </div>



              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </div>
              </div>

  
            </div>
          </div>
        </div>
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

    