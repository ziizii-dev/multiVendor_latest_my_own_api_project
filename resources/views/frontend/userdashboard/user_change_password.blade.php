@extends('dashboard')
@section('user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span>  My Account
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">


                    <!-- // Start Col md 3 menu -->
    @include('frontend.body.dashboard_sidebar_menu')
<!-- // End Col md 3 menu -->



                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Change Password</h5>
                                    </div>
                                    <div class="card-body">

                                        <form action="{{route('user#updatePassword')}}" method="POST">
                                            @csrf
                                            @if(session('status'))
                                            <div class="alert alert-success" role="alert">
                                            {{session('status')}}
                                            </div>
                                            @elseif (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{session('error')}}
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Old Password <span class="required">*</span></label>
                                                    <input  class="form-control @error('oldPassword') is-invalid
                                                    @enderror " name="oldPassword" id="currentPassword" type="password" placeholder="Old Password" />
                                                    @error('oldPassword')
                                              <div class="invalid-feedback">
                                                     {{$message}}
                                                </div>

                                                 @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>New Password <span class="required">*</span></label>
                                                    <input  class="form-control @error('newPassword') is-invalid
                                                    @enderror " name="newPassword" id="newPassword" type="password" placeholder="New Password" />
                                                    @error('newPassword')
                                              <div class="invalid-feedback">
                                                     {{$message}}
                                                </div>

                                                 @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Confirm Password <span class="required">*</span></label>
                                                    <input  class="form-control @error('confirmPassword') is-invalid
                                                    @enderror " name="confirmPassword" id="confirmPassword" type="password" placeholder="Confirmation Password" />
                                                    @error('confirmPassword')
                                              <div class="invalid-feedback">
                                                     {{$message}}
                                                </div>

                                                 @enderror
                                                </div>


                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>





                        </div>
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
