<details>

<summary>
  2.2.2023
</summary>

 ## Learning


   - Create Database and Configuration

   -Install Laravel Breeze

   - Seed Demo User Data

   - Laravel Multi Auth with Breeze Part 1

   - Laravel Multi Auth with Breeze Part 2

   -Laravel Multi Auth with Breeze Part 3

   -Laravel Multi Auth with Breeze Part 4

   -Project Theme Overview

   -Admin Template Setup

   -Dashboard Page Segmentation

   -Admin Logout Option

   -Customize Login Form
   
   -Refreach Admin Template

  

## project


</details>
<details>

<summary>
  2.6.2023
</summary>

 ## Learning


   -Admin Profile Change Password Part 2

   -Vendor Template Setup

   - Vendor Logout Option

   - Vendor Profile & Image Update Part 1

   -Vendor Profile & Image Update Part 2

   -Vendor Profile Change Password

   -Frontend Template Setup Part 1
## project


</details>
<details>

<summary>
  2.7.2023
</summary>

 ## Learning


   -Frontend Template Setup Part 2

   -Frontend Template Login Page Setup

   -Frontend Template Register Page Setup

   -Frontend Template Forget Password Page Setup

   -User Profile Design Part 1

   -User Profile Design Part 2

   -User Profile Design Part 3

   -User Logout Option

   -User Profile¦ Password Change Part 1

   -User Profile¦ Password Change Part  2

   -Update User Login Setup with and without Login

   -User Login and Logout Notification

   -Brand Page Design Part 1
   
   -Brand Page Design Part 2
   

## project


</details>
<details>

<summary>
  2.8.2023
</summary>

 ## Learning


   -Frontend Template Setup Part 3

   -nstall Image Intervention Package

   -Brand Crud Part 1

   -Add Validation Message

   -Brand Crud Part 2

   -Brand Crud Part 3

   -Brand Crud Part 4 Delete With Sweelalert Alert 2

   -Category Crud Part 1

   -Category Crud Part 2

   -Category Crud Part 3

   -Subcategory Crud Part 1

   -Subcategory Crud Part 2
## project
~~
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

~~

~~<script> 
 
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
   
  </script>~~

  ~~
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
  ~~
   <script>
        $(document).ready(function() {
            $('#orderStatus').change(function() {
                $status = $('#orderStatus').val();
                // console.log($status);
                // $.ajax({
                //     type: 'get',
                //     url: 'http://127.0.0.1:8000/order/ajax/status',
                //     data: {
                //         'status': $status
                //     },
                //     dataType: 'json',
                //     success: function(response) {
                //         $list = " ";
                //         for ($i = 0; $i < response.length; $i++) {
                //             $months = ['January','February','March','April','May','June','July','Auguest','Setemper','October','November','December'];
                //             $dbDate = new Date(response[$i].created_at);
                //             $finalDate = $months[$dbDate.getMonth()]+"-"+$dbDate.getDate()+"-"+ $dbDate.getFullYear();
                //            if(response[$i].status == 0){
                //             $statusMessage =` <select name="status" class="statusChange">
                //                   <option value="0" selected >Pending</option>
                //                   <option value="1">Accept</option>
                //                   <option value="2" >Reject</option>
                //                </select>`;
                //            }else if(response[$i].status == 1){
                //             $statusMessage = ` <select name="status" class="statusChange">
                //                   <option value="0" >Pending</option>
                //                   <option value="1" selected>Accept</option>
                //                   <option value="2" >Reject</option>
                //                </select>`;
                //            }else if(response[$i].status == 2){
                //             $statusMessage = ` <select name="status" class="statusChange">
                //                   <option value="0" >Pending</option>
                //                   <option value="1" >Accept</option>
                //                   <option value="2" selected >Reject</option>
                //                </select>`;
                //            }

                //             $list += `<tr class="tr-shadow">
                //                 <input type="hidden" class="orderId" value="${response[$i].id}">
                //                     <td class="col-3" >${response[$i].user_id} </td>
                //                     <td class="col-3" >${response[$i].user_name} </td>
                //                     <td class="col-3" >${$finalDate} </td>
                //                     <td class="col-3" >${response[$i].order_code} </td>
                //                     <td class="col-3" >${response[$i].total_price}kyats</td>
                //                    <td class="col-3">${$statusMessage} </td>

                //      </tr>`;
                //         }
                //         $('#dataList').html($list);
                //     }

                // })
            })
            //change status
            $('.statusChange').change(function(){
                $currentStatus = $(this).val();
                $parentNode = $(this).parents("tr");
                $orderId = $parentNode.find('.orderId').val();

                $data = {
                    'orderId':$orderId,
                    'status': $currentStatus

                };

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/order/ajax/change/status',
                    data:$data,
                    dataType:'json',
                });
                location.reload();
            })

        })
    </script>
  ~~

</details>
<details>

<summary>
  2.9.2023
</summary>

 ## Learning


   -Category Crud Part 3

   -Subcategory Crud Part 1

   -Subcategory Crud Part 2

   -Subcategory Crud Part 3

   - Add Vendor Register Page Setup Part 1

   -Add Vendor Register Page Setup Part 2

   -Add Vendor Register Page Setup Part 3

   -Add Vendor Register Page Setup Part 4

   -Add Vendor Register Page Setup Part 5

   -Add Vendor Register Page Setup Part 6

   
  

## project


</details>
<details>

<summary>
  2.10.2023
</summary>

 ## Learning


 
   - Add Vendor Register Page Setup Part 6

   -Add Vendor Register Page Setup Part 7

   -Add Vendor Register Page Setup Part 8

   -Add Product Database and Page Design Part 1

   -Add Product Database and Page Design Part 2

   -Add Product Database and Page Design Part 3

   -Add Product Database and Page Design Part 4
   
   -Show Image Using Javascript

   -Load Category Brand Subcategory Vendor Part 1

   -Load Category Brand Subcategory Vendor Part 2

   -Load Category Brand Subcategory Vendor Part 3

   
  

## project


</details>
<details>

<summary>
  2.11.2023
</summary>

 ## Learning


 
   -Add Validation In Product Table

   -Product Upload Part 1

   -Product Upload Part 2

   -Manage Product Read All Product

   -Manage Product Edit Option Part 1

   -Manage Product Edit Option Part 2

   -Manage Product Update Option
   
## project


</details>
<details>

<summary>
  2.13.2023
</summary>

 ## Learning


 
   -Manage Product Update Single & Multiple Image Part  1

   -Manage Product Update Single & Multiple Image Part 2

   -Manage Product Update Single & Multiple Image Part 3

   -Manage Product Update Single & Multiple Image Part 4

   -Multiple image Delete

   -Product Active Inactive

   -Product Delete With Multiple Image

   -Bug Fixed for Redirect Login Page

   -Add Product From Vendor Database and Page Design Part 1

   -Add Product From Vendor Database and Page Design Part 2

   -Add Product From Vendor Database and Page Design Part 3

   -Add Product From Vendor Database and Page Design Part 4

   
   
## project


</details>
<details>

<summary>
  2.14.2023
</summary>

 ## Learning


 
   -Add Product From Vendor Database and Page Design Part 5

   -Add Product From Vendor Database and Page Design Part 6

   -Backend Slider CRUD Setup Part 1

   -Backend Slider CRUD Setup Part 2

   -Backend Slider CRUD Setup Part 3

   -Backend Banner CRUD Setup Part 1

   -Backend Banner CRUD Setup Part 2

   -Backend Banner CRUD Setup Part 3

   -Add Some Demo Data

   -Frontend Show Category Subcategory Part 1

   -Frontend Show Category Subcategory Part 2

   -Frontend Dynamic Main Sliders

   -Frontend Dynamic Featured Categories Display

   -Frontend Dynamic Ads Display

   -Frontend Dynamic New Product Display Part 1

   -Frontend Dynamic New Product Display Part 2

   -Frontend Dynamic New Product Display Part 3

   
   
## project


</details>
<details>

<summary>
  2.15.2023
</summary>

 ## Learning


 
   -Product Details Show Part 1

   -Product Details Show Part 2

   -Product Details Show Part 3

   -Product Details Show Part 4

   -Product Details Show Part 5

   -Product Details Show Part 6

   -Product Details Show Part 7

   -Product Details Show Part 

   -Featured Product Show

   
   
   
## project


</details>
<details>

<summary>
 For resources
</summary>

 ## Learning
 -For Invoice pdf
    -composer require barryvdh/laravel-dompdf
 -For permission in laravel 
     [https://spatie.be/docs/laravel-permission/v5/installation-laravel]  
   -From the basic useage , we select those ->use Spatie\Permission\Traits\HasRoles;
                                            ->use Spatie\Permission\Traits\HasRoles;
                                            ->HasRoles
                                            and put into the user.php file. 
    -For Notification 
       -Go laravel and find that notification and inter notification-databse and run these the commend
            -php artisan notifications:table
               php artisan migrate
                                               
 [https://www.jqueryscript.net/form/Price-Range-Slider-jQuery-UI.html#google_vignette]
 php artisan serve --host=192.168.2.136:9999 --port=9999
   
   
   
## project


</details>
<details>
#For api data
Vendor Section =>
The following apis can be used for the vendor section.
The first api  use for vendor register . It includes name,username,email,password.
 http://192.168.2.111:9999/api/vendor/register 

The second api use for vendor login.
http://192.168.2.111:9999/api/vendor/login

It needs  the token when registered  info from the first api.
The data is essential  including email and password.
  http://192.168.2.111:9999/api/vendor/logout
The third api use for  vendor logout . It also needs the token  for vendor logout.

We can see the vendor lists from the below api.
http://192.168.2.111:9999/api/vendor/user/list

The above apis are for the Vendor Auth Section.



http://192.168.2.111:9999/api/vendor/detail/2
We  use this api  as a Get Method.
This  api use for Vendor detail . It can see by using the Vendor id and we can see the related data  in details.



http://192.168.2.111:9999/api/vendor/profile/detail/2
The vendor/profile/detail  api use for Vendor profile update. You have to login and must reach your profile  page.
You can edit your profile and can update your data including name,email,phone,address,vendor_join ,etc.
This api used put  method.



http://192.168.2.111:9999/api/vendor/password/update
The vendor /password/update use to updating for profile password update.The old password is required and the same password in new password and confirmation password.



http://192.168.2.111:9999/api/vendor/product
The vendor /product api use for creating product data.
It needs brand _id, category_id, subcategory_id ,features and special offer etc.

http://192.168.2.111:9999/api/vendor/product
You can  read all  products data created by the vendor.

http://192.168.2.111:9999/api/vendor/product/28
The api/vendor /product use the post method to update product data.

http://192.168.2.111:9999/api/vendor/product/31
This api use  for deleting product data by using delete method.





http://192.168.2.111:9999/api/vendor/brand
The api/vendor/brand use for creating brands by using post method including brand_name and brand_image.

http://192.168.2.111:9999/api/vendor/brand
This api use to read vendor brand data by using Get Method and can search the brand data through the params,the key is brand_name and the value is what you  want to searching brand data.


http://192.168.2.111:9999/api/vendor/brand/4
The vendor/brand/id is also use for updating brand data  to the specific brand id.
The api use the PUT method.

http://192.168.2.111:9999/api/vendor/brand/4
This api for deleting brand data by using delete method.



http://192.168.2.111:9999/api/vendor/category
The above vendor/category use for creating vendor category by using post method including category_name an category_image.


http://192.168.2.111:9999/api/vendor/category
The api use for  seeing all category data by using Get Method.

http://192.168.2.111:9999/api/vendor/category/11
Use for updating the category data by the specific id data by using the put method.

 

http://192.168.2.111:9999/api/vendor/category/11
Use for category data deleting by the specific id  with the delete method.

Vendor Section End  but Also other data are missing to fill by the Backend Section.


User Section=>
The following apis are  User Sections .
User Auth Section.
http://192.168.2.111:9999/api/register
Using for the registered user including data are  name,user_name,email,password ,password_confirmation by using post method.

http://192.168.2.111:9999/api/login
Use for the user login section by using Register data. The token is generated in the login  part.This section uses the Post method.

http://192.168.2.111:9999/api/logout
Use for the logout user by using Post method, and the token is required.

http://192.168.2.111:9999/api/user
Using to read User lists by Get Method.

User Profile  Section=>

http://192.168.2.111:9999/api/user/detail/33
Used  to read user details by the user id but you need to login as a user.
This api uses the Get method.

http://192.168.2.111:9999/api/user/profile/detail/33
Use for the user profile update by usingPUT method.

http://192.168.2.111:9999/api/user/password/update
Use to update user password by using post method.

User Index Data Section=>

http://192.168.2.111:9999/api/
Using to show the user dashboard including all product data and category data.
Use=>Get Method without using middleware.

http://192.168.2.111:9999/api/product/details/9/fujiflin
Use to see product details by the specific id and slug data.
Use=>Get Method without using middleware.



http://192.168.2.111:9999/api/vendor/details/2
User can see the active vendor list detail through the project and their details by using
Get method.


http://192.168.2.111:9999/api/vendor/all
Use to read  all vendors and you can search from the params ,the key is name by using get method.


http://192.168.100.23:9999/api/product/category/1/camera
Use for reading the  category details and the related product data , the  category  data, the relating  category data, the new product data .
Use=>Get method.

http://192.168.2.111:9999/api/product/view/model/36
Using to read product details  by the id .
Use=>Get Method.

http://192.168.2.111:9999/api/search
Use to search  the included  product by using the post method, ,the relating products are presenting together,the key is  search.

http://192.168.2.111:9999/api/search-product
Use to search the specific product data by using the post method.

</details>
