@extends('vendor.vendor_dashboard')
@section('vendor')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Vendor Edit Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor Edit New Product</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->



  <div class="card">
      <div class="card-body p-4">
          <h5 class="card-title">Vendor Edit New Product</h5>
          <hr/>
        <form id="myForm" action="{{route('vendor#updateProduct')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$products->id}}">
           <div class="form-body mt-4">
            <div class="row">
               <div class="col-lg-8">
               <div class="border border-3 p-4 rounded">

                <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid
                    @enderror" id="inputProductTitle" placeholder="Enter product title" value="{{$products->product_name}} ">
                    @error('product_name')
                    <div class="invalid-feedback">
                      {{$message}}
                        </div>
                      @enderror
                </div>
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Tag</label>
                    <input type="text" name="product_tags" class="form-control visually-hidden @error('product_tags') is-invalid @enderror" data-role="tagsinput"  value="{{$products->product_tags}}>
                    @error('product_tags')
                    <div class="invalid-feedback">
                          {{$message}}
                         </div>

                     @enderror
                  </div>
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Size</label>
                    <input type="text" name="product_size" class="form-control visually-hidden
                    @error('product_size') is-invalid
                    @enderror" data-role="tagsinput" value="{{$products->product_size}}">
                    @error('product_size')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>

                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Product Color</label>
                    <input type="text" name="product_color" class="form-control visually-hidden @error('product_color') is-invalid
                    @enderror" data-role="tagsinput" value="{{$products->product_color}}">
                    @error('product_color')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>

                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Short Description</label>
                    <textarea class="form-control @error('short_descp') is-invalid
                    @enderror" name="short_descp" id="inputProductDescription" rows="3">
                    {{$products->short_descp}}
                </textarea>
                @error('short_descp')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>

                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="inputProductDescription" class="form-label">Long Description</label>
                    <textarea class="form-control @error('long_descp') is-invalid
                    @enderror" name="long_descp" id="inputProductDescription" rows="3">
                    {{$products->long_descp}}
                </textarea>
                @error('long_descp')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>

                    @enderror
                  </div>

                </div>
               </div>
               <div class="col-lg-4">
                <div class="border border-3 p-4 rounded">
                  <div class="row g-3">
                    <div class="col-md-6">
                        <label for="inputPrice" class="form-label">Product Price</label>
                        <input type="text" name="selling_price" class="form-control @error('selling_price ') is-invalid
                        @enderror" id="inputPrice" placeholder="00.00" value="{{$products->selling_price}}">
                        @error('selling_price ')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>

                    @enderror

                      </div>
                      <div class="col-md-6">
                        <label for="inputCompareatprice" class="form-label">Discount Price</label>
                        <input type="text" name="discount_price" class="form-control @error('discount_price ') is-invalid
                        @enderror" id="inputCompareatprice" placeholder="00.00" value="{{$products->discount_price}}">
                        @error('discount_price ')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>

                    @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="inputCostPerPrice" class="form-label">Product Code</label>
                        <input type="text" name="product_code" class="form-control  @error('product_code') is-invalid
                        @enderror" id="inputCostPerPrice" placeholder="00.00" value="{{$products->product_code}}">
                        @error('product_code')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                        @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="inputStarPoints" class="form-label">Product Quantity</label>
                        <input type="text" name="product_qty" class="form-control @error('product_qty') is-invalid
                        @enderror" id="inputStarPoints" placeholder="00.00" value="{{$products->product_qty}}">
                        @error('product_qty')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                        @enderror
                      </div>

                      <div class="col-12">
                        <label for="inputProductType" class="form-label">Product Brand </label>
                        <select name="brand_id" class="form-select  @error('brand_id') is-invalid
                        @enderror" id="inputProductType">
                            <option> Select Product Brand</option>
                            @foreach ( $brands as $brand )
                            <option value="{{$brand->id}}" {{$brand->id == $products->brand_id ? 'selected':''}} >{{$brand->brand_name}} </option>
                            @endforeach


                          </select>
                          @error('brand_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                        @enderror
                      </div>
                      <div class="col-12">
                        <label for="inputVendor" class="form-label">Product Category</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid
                        @enderror" id="inputVendor">
                            <option>Select Category</option>
                            @foreach ( $categories as $cat )
                            <option value="{{$cat->id}}" {{$cat->id == $products->category_id ? 'selected':''}}> {{$cat->category_name}} </option>
                            @endforeach
                          </select>
                          @error('category_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>

                          @enderror
                      </div>
                      <div class="col-12">
                        <label for="inputCollection" class="form-label">Product Subcategory</label>
                        <select name="subcategory_id" class="form-select  @error('subcategory_id') is-invalid
                        @enderror" id="inputCollection">
                            <option></option>
                            @foreach ( $subcategory as $subcat )
                            <option value="{{$subcat->id}}" {{$subcat->id == $products->subcategory_id ? 'selected':''}}>{{$subcat->subcategory_name}} </option>
                            @endforeach

                          </select>
                          @error('subcategory_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>

                          @enderror
                      </div>

                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="flexCheckDefault" {{$products->hot_deals == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckDefault">Hot Deals</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" name="featured" type="checkbox" value="1" id="flexCheckDefault" {{$products->featured == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckDefault">Featured</label>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" name="special_offer" type="checkbox" value="1" id="flexCheckDefault" {{$products->special_offer == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckDefault"
                            >Special Offer</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" name="special_deals" type="checkbox" value="1" id="flexCheckDefault" {{$products->special_deals == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="flexCheckDefault" >Special Deals</label>
                        </div>
                      </div>
                    </div>
                    <hr>
                      <div class="col-12">
                          <div class="d-grid">
                             <button type="submit" class="btn btn-primary">Save Product</button>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
           </div><!--end row-->

        </form>
        </div>
      </div>
  </div>

   {{-- Main Image Thambnail --}}
  <div class="page-content">
    <h6 class="mb-0 text-uppercase">Update Main Image Thambnail</h6>
    <hr>
<div class="row">
    <div class="card">
        <form id="myForm" action="{{route('vendor#updateProductThambnail')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$products->id}} ">
            <input type="hidden" name="old_img" value="{{$products->product_thambnail}} " class="form-control @error('old_img') is-invalid
            @enderror">

            @error('old_img')
            <div class="invalid-feedback">
                {{$message}}
            </div>

            @enderror
        <div class="card-body">

            <div class="mb-3">
                <label for="formFile" class="form-label">Select Thambnail Image</label>
                <input name="product_thambnail" class="form-control" type="file" id="formFile" multiple="">
            </div>
            <div class="mb-3">
                  <img src="{{asset($products->product_thambnail)}} " style="width:100px; height:100px" alt="">
            </div>
            <input type="submit" class="btn btn-primary px-4" value="Save Changes">
        </div>
        </form>

      </div>
</div>

  </div>
  {{-- End Main Image Thambnail --}}
  {{-- Start Multi Image  --}}
  <div class="page-content">
    <h6 class="mb-0 text-uppercase">Update Multi Image</h6>
    <hr>
  <div class="card col-lg-12">

    <div class="card-body">
        <table class="table mb-0 table-striped">
            <thead>
                <tr>
                    <th scope="col">#Sl</th>
                    <th scope="col">Image</th>
                    <th scope="col">Change Image</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <form id="myForm" action="{{route('vendor#updateProductMultiImage')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @foreach ($multiImgs as $key=>$img )
                    <tr>
                        <th scope="row">{{$key+1}} </th>
                        <td><img src="{{asset($img->photo_name)}} " style="width:70px; height:40px" alt=""> </td>
                        <td>
                            <input type="file" class="form-group" name="multi_img[{{$img->id}}]" id="">
                        </td>
                        <td>
                            <input type="submit" class="btn btn-primary px-2" value=" Update Image ">
                            <a href="{{route("vendor#productMultiImgeDelete",$img->id)}} " class="btn btn-danger" id="delete">Delete</a>
                        </td>
                    </tr>
                    @endforeach ()



                </form>
            </tbody>
        </table>
    </div>
</div>
</div>
  {{-- End Multi Image --}}
</div>
{{-- <script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(run){
              var reader = new FileReader();
              reader.onload = function(run){
                $('#showImage').attr('src', run.target.result);

              }
              reader.readAsDataURL (run.target.files['0'])
        });
    });

    </script> --}}

<script type="text/javascript">
 function mainThamUrl(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
 }
</script>
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
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
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
    <script type="text/javascript">
    // <option value="{{$cat->id}}">{{$cat->category_name}} </option>
    $(document).ready(function(){
        $('select[name ="category_id"]').change(function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url:"{{ url('/subcategory/ajax')}}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success: function(data){
                        $('select[name = "subcategory_id"]').html('');
                        var d = $('select[name = "subcategory_id"]').empty();
                        $.each(data,function(key,value){
                            $('select[name = "subcategory_id"]').append('<option value="'+ value.id +' ">' + value.subcategory_name + '</option>');
                        });
                    },
                });
            }else{
              alert('danger');
            }
        })
    })
    </script>

@endsection
