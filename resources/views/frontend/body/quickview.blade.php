<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <!-- MAIN SLIDES -->
                            <div><img src=" " alt="product image" id="pimage" /></div>

                            <!-- THUMBNAILS -->

                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30" id="sizeArea">
                            <h3 class="title-detail">
                                <h3 href="#" class="text-heading" id="pname"> </h3>
                            </h3>
                            <div class="input-group mb-30">
                                <label class="input-group-text" for="inputGroupSelect01">
                                    <strong style="width:50px;">Size : </strong> </label>
                                <select class="form-select" id="size" name="size">
{{-- <option value=" l"></option> --}}

                                </select>
                            </div>
                            <div class="input-group mb-30" id="colorArea">
                                <label class="input-group-text" for="inputGroupSelect01">
                                    <strong style="width:50px;">Color : </strong> </label>
                                <select class="form-select" id="inputGroupSelect01" id="color" name="color">


                                </select>
                            </div>
                        </div>



                        <div class="clearfix product-price-cover">
                            <div class="product-price primary-color float-left">
                                <span class="current-price text-brand">$</span>
                                <span class="current-price text-brand" id="pprice"></span>
                                <del>
                                    <span class="old-price font-md ml-15" >$</span>
                                    <span class="old-price font-md ml-15" id="oldprice"></span>

                                </del>

                            </div>
                        </div>
                        <div class="detail-extralink mb-30">
                            <div class="detail-qty border radius">
                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                <input type="text" name="qty" id="qty" class="qty-val" value="1"
                                    min="1">
                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                            </div>
                            <div class="product-extra-link2">

                             <input type="hidden" name="" id="product_id" value="">

                                <button type="submit" class="button button-add-to-cart" onclick="addToCart()"><i
                                        class="fi-rs-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Brand: <span class="text-brand" id="pbrand"></span></li>
                                        <li class="mb-5">Category:<span class="text-brand" id="pcategory"> </span>

                                        </li>
                                        <li class="mb-5">Vendor:<span class="text-brand" id="pvendor_id"> </span></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Product Code: <span class="text-brand" id="pcode"></span>
                                        </li>
                                        <li class="mb-5">
                                            Stock:
                                            <span class="badge badge-pill badge-success"
                                                id="aviable" style="background:green; color:white; "> </span>

                                            <span class="badge badge-pill badge-danger" id="stockout"
                                                style="background:red; color:white; "> </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Detail Info -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
