
@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Permission</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Permission</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">

                <div class="col-lg-10">
                    <div class="card">
                        <form id="myForm" action="{{route('store.permission')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Permission Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid
                                        @enderror " value=" " />
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Group Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <label for="">Open this select Group</label>
                                        <select name="group_name" class="form-select mb-3 @error('group_name') is-invalid

                                        @enderror" aria-label="Default select example">
                     <option selected=""></option>
					<option value="brand">Brand</option>
					<option value="category">Category</option>
					<option value="subcategory">Subcategory</option>
					<option value="product">Product</option>
					<option value="slider">Slider</option>
                    <option value="banner">Banner</option>
					<option value="ads">Ads</option>
					<option value="coupon">Coupon</option>
					<option value="area">Area</option>
					<option value="vendor">Vendor</option>
					<option value="order">Order</option>
					<option value="return">Return</option>
					<option value="report">Report</option>
					<option value="user">User Management</option>
					<option value="review">Review</option>
					<option value="setting">Setting</option>
					<option value="blog">Blog</option>
                    <option value="permission">Permission</option>
					<option value="role">Role</option>
					<option value="admin">Admin</option>
					<option value="stock">Stock</option>
                                        </select>

                                        @error('roup_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>

                                        @enderror
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(run){
              var reader = new FileReader();
              reader.onload = function(run){
                $('#showImage').attr('src', run.target.result);

              }
              reader.readAsDataURL (run.target.files['0'])
        });
    });

    </script>

@endsection
