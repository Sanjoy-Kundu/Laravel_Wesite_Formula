@extends('layouts.dashboardmaster')

@section('content')
    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        @if (session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif
                                        <h5>Product Information</h5>
                                        {{--   <p>{{ $editProduct }}</p> --}}
                                    </div>

                                    <form class="theme-form theme-form-2 mega-form"
                                        action="{{ url('product/update') }}/{{ $editProduct->id }}" method="POST">
                                        @csrf
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Product Name"
                                                    name="product_name" value="{{ $editProduct->product_name }}">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Product
                                                Type</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="product_type">
                                                    <option>
                                                        {{ $editProduct->product_type }}</option>
                                                    <option disabled>Static Menu</option>
                                                    <option>Simple</option>
                                                    <option>Classified</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Category</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="product_category">
                                                    <option disabled>Category Menu</option>
                                                    <option>{{ $editProduct->product_category }}</option>
                                                    <option>TV & Appliances</option>
                                                    <option>Home & Furniture</option>
                                                    <option>Another</option>
                                                    <option>Electronics</option>
                                                    <option>Baby & Kids</option>
                                                    <option>Health, Beauty & Perfumes</option>
                                                    <option>Uncategorized</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Price</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Product Price"
                                                    name="product_price" value="{{ $editProduct->product_price }}">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Brand</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="product_brand">
                                                    <option disabled>Brand Menu</option>
                                                    <option>{{ $editProduct->product_brand }}</option>
                                                    <option value="puma">Puma</option>
                                                    <option value="walton">Walton</option>
                                                    <option value="hrx">HRX</option>
                                                    <option value="roadster">Roadster</option>
                                                    <option value="zara">Zara</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Unit</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="product_unit">
                                                    <option disabled>Unit Menu</option>
                                                    <option>{{ $editProduct->product_unit }}</option>
                                                    <option>Kilogram</option>
                                                    <option>Pieces</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Tags</label>
                                            <div class="col-sm-9">
                                                <div class="bs-example">
                                                    <input type="text" class="form-control"
                                                        placeholder="Type tag & hit enter" id="#inputTag"
                                                        data-role="tagsinput" name="product_tag"
                                                        value="{{ $editProduct->product_tag }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Product
                                                Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="product_description" id="" rows="5">{{ $editProduct->product_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-danger">Update Category</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Product Add End -->

                <!-- footer Start -->
                <div class="container-fluid">
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- footer En -->
            </div>
            <!-- Container-fluid End -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End -->

    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn  btn--yes btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
@endsection
