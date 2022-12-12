@extends('layouts.dashboardmaster')
@section('content')
    <!-- Container-fluid starts-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Products List</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">import</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Export</a>
                                        </li>
                                        <li>
                                            <a class="btn btn-solid" href="{{ url('product/add') }}">Add
                                                Product</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    @if (session('delete_success'))
                                        <div class="alert alert-danger">{{ session('delete_success') }}</div>
                                    @endif
                                    <table class="table all-package theme-table table-product" id="table_id">
                                        <thead>
                                            {{-- <tr>
                                                <th>Serial No</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Current Qty</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Option</th>
                                            </tr> --}}
                                            <tr>
                                                <th>Serial No</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Product Type</th>
                                                <th>Product Category</th>
                                                <th>Product Price</th>
                                                <th>Product Brand</th>
                                                <th>Product Unit</th>
                                                <th>Product Tag</th>
                                                <th>Product Description</th>
                                                <th>Action</th>
                                                <th>Uploaded Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($all_products as $product)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <div class="table-image">
                                                            <img src="{{ asset('assets') }}/images/product/1.png"
                                                                class="img-fluid" alt="">
                                                        </div>
                                                    </td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->product_type }}</td>
                                                    <td>{{ $product->product_category }}</td>
                                                    <td>$ {{ $product->product_price }}</td>
                                                    <td>{{ $product->product_brand }}</td>
                                                    <td>{{ $product->product_unit }}</td>
                                                    <td>{{ $product->product_tag }}</td>
                                                    <td>{{ $product->product_description }}</td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="order-detail.html">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ url('product/edit') }}/{{ $product->id }}">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ url('product/delete') }}/{{ $product->id }}">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        {{ $product->created_at->diffForHumans() }}
                                                        {{ $product->created_at->format('d-m-Y') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <td>No category yet uploaded</td>
                                            @endforelse

                                            {{-- <tr>
                                                <td>01</td>
                                                <td>
                                                    <div class="table-image">
                                                        <img src="{{ asset('assets') }}/images/product/1.png"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                </td>

                                                <td>Aata Buscuit</td>

                                                <td>Buscuit</td>

                                                <td>12</td>

                                                <td class="td-price">$95.97</td>

                                                <td class="status-danger">
                                                    <span>Pending</span>
                                                </td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="order-detail.html">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="javascript:void(0)">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalToggle">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr> --}}


                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive mt-5">

                                    <h5 class="title-header option-title">Recycle Bin Store</h5>
                                    @if (session('product_successfully'))
                                        <div class="alert alert-success"> {{ session('product_successfully') }}</div>
                                    @endif

                                    <table class="table all-package theme-table table-product" id="table_id">

                                        <thead>
                                            {{-- <tr>
                                                <th>Serial No</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Current Qty</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Option</th>
                                            </tr> --}}
                                            <tr>
                                                <th>Serial No</th>
                                                <th>Product Image</th>
                                                <th>Product Name</th>
                                                <th>Product Type</th>
                                                <th>Product Category</th>
                                                <th>Product Price</th>
                                                <th>Product Brand</th>
                                                <th>Product Unit</th>
                                                <th>Product Tag</th>
                                                <th>Product Description</th>
                                                <th>Action</th>
                                                <th>Uploaded Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @forelse ($trashed_products as $product)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <div class="table-image">
                                                            <img src="{{ asset('assets') }}/images/product/1.png"
                                                                class="img-fluid" alt="">
                                                        </div>
                                                    </td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->product_type }}</td>
                                                    <td>{{ $product->product_category }}</td>
                                                    <td>$ {{ $product->product_price }}</td>
                                                    <td>{{ $product->product_brand }}</td>
                                                    <td>{{ $product->product_unit }}</td>
                                                    <td>{{ $product->product_tag }}</td>
                                                    <td>{{ $product->product_description }}</td>


                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ url('product/permanent/delete') }}/{{ $product->id }}"
                                                                style="background-color: red; color:white;">Permanent
                                                                Delete</a>
                                                            <a href="{{ url('product/restore') }}/{{ $product->id }}"
                                                                style="background-color: orange; color:white;">Restore</a>

                                                        </div>

                                                    </td>
                                                    <td>
                                                        {{ $product->created_at->diffForHumans() }}
                                                        {{ $product->created_at->format('d-m-Y') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <td>No category yet uploaded</td>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <div class="container-fluid">
            <!-- footer start-->
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>
    </div>
    <!-- page-wrapper End-->

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

    <!-- Delete Modal Box Start -->
    <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-block text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box">
                        <p>The permission for the use/group, preview is inherited from the object, object will create a
                            new permission for this object</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-target="#exampleModalToggle2"
                        data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle2" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box text-center">
                        <div class="wrapper">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                    fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                        </div>
                        <h4 class="text-content">It's Removed.</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal Box End -->
@endsection
