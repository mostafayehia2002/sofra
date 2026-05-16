@extends('layouts.dashboard')
@section('title')
    Restaurant-Profile
@stop
@section('content')
    <!-- Profile Cover -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                           href="javascript:;">Pages</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Restaurants</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                    <h2 class="page-header-title">Profile</h2>
                </div>

                <div class="col-auto">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditProfile">
                        <i class="bi bi-pen"></i>
                        Edit Profile
                    </button>

                </div>
            </div>
        </div>
        <!-- End Page Header -->

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- errors--}}
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{$error}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endforeach
        @endif

        <div class="profile-cover">
            <div class="profile-cover-img-wrapper">
                <img class="profile-cover-img" src="{{asset('assets/img/1920x400/img1.jpg')}}"
                     alt="Image Description">
            </div>
        </div>
        <!-- End Profile Cover -->

        <!-- Profile Header -->
        <div class="text-center mb-5">
            <!-- Avatar -->
            <div class="avatar avatar-xxl avatar-circle profile-cover-avatar">
                <img class="avatar-img" src="{{asset('restaurant_image/profile/'.$restaurant->image)}}"
                     alt="Image Description">
                <span class="avatar-status avatar-status-success"></span>
            </div>
            <!-- End Avatar -->

            <h1 class="page-header-title">{{$restaurant->name}}
                            <i class="bi-patch-check-fill text-primary" data-toggle="tooltip"
                               data-bs-placement="top" title="Top endorsed"></i>
            </h1>
            <!-- List -->
            <ul class="list-inline list-px-2">
                <li class="list-inline-item">
                    <i class="bi bi-envelope"></i>
                    <span>{{$restaurant->email}}</span>
                </li>
                <li class="list-inline-item">
                    <i class="bi-geo-alt me-1"></i>
                    <a href="#">{{$restaurant->region['name']}}</a>

                </li>
                <li class="list-inline-item">
                    <i class="bi-calendar-week me-1"></i>
                    <span>Joined {{date_format($restaurant->created_at,'Y:m:d && h:i:A')}}</span>
                </li>

            </ul>
            <!-- End List -->
        </div>
        <!-- End Profile Header -->

        <!-- Nav -->
        <div class="row">
        <ul class="nav nav-pills justify-content-left mb-7" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="nav-one-eg2-tab" href="#nav-one-eg2" data-bs-toggle="pill" data-bs-target="#nav-one-eg2" role="tab" aria-controls="nav-one-eg2" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <i class="bi-house"></i>
                        Home
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-two-eg2-tab" href="#nav-two-eg2" data-bs-toggle="pill" data-bs-target="#nav-two-eg2" role="tab" aria-controls="nav-two-eg2" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <i class="bi-person"></i>
                        Products
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-three-eg2-tab" href="#nav-three-eg2" data-bs-toggle="pill" data-bs-target="#nav-three-eg2" role="tab" aria-controls="nav-three-eg2" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <i class="bi-gear"></i>
                        Reviews
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="nav-four-eg2-tab" href="#nav-four-eg2" data-bs-toggle="pill" data-bs-target="#nav-four-eg2" role="tab" aria-controls="nav-four-eg2" aria-selected="false">
                    <div class="d-flex align-items-center">
                        <i class="bi-gear"></i>
                        Offers
                    </div>
                </a>
            </li>
        </ul>
        <!-- End Nav -->

        <!-- Tab Content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="nav-one-eg2" role="tabpanel" aria-labelledby="nav-one-eg2-tab">
                        <!-- Table -->
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Key</th>
                                <th scope="col">Value</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <th scope="row">Restaurant Name :</th>
                                    <td>{{$restaurant->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email :</th>
                                <td>{{$restaurant->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status  :</th>
                                <td>{{$restaurant->status}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Region :</th>
                                <td>{{$restaurant->region['name']}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Categories:</th>

                                <td>
                                    @foreach($restaurant->categories as $category)
                                        <span>{{$category->name}}</span>
                                        @if($loop->index+1 !== count($restaurant->categories))
                                            <span>/</span>
                                        @endif
                                   @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Minimum Charger  :</th>
                                <td> <strong><mark>{{$restaurant->minimum_charger}}</mark></strong></td>
                            </tr>
                            <tr>
                                <th scope="row">Delivery Cost  :</th>
                                <td> <strong><mark>{{$restaurant->delivery_cost}} </mark></strong></td>
                            </tr>
                            <tr>
                                <th scope="row">Phone  :</th>
                                <td>{{$restaurant->phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">WhatsApp  :</th>
                                <td>{{$restaurant->whatsapp}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created At</th>

                                    <td>{{date_format($restaurant->created_at,'Y:m:d  && h:i:A')}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Updated At</th>
                                <td>{{date_format($restaurant->updated_at,'Y:m:d  && h:i:A')}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- End Table -->
            </div>
          <!--  End Tab1 -->

            <div class="tab-pane fade" id="nav-two-eg2" role="tabpanel" aria-labelledby="nav-two-eg2-tab">
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-12 col-md">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-header-title">Products</h5>
                                </div>
                            </div>

                            <div class="col-auto">
                                <!-- Filter -->
                                <form>
                                    <!-- Search -->
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend input-group-text">
                                            <i class="bi-search"></i>
                                        </div>
                                        <input id="datatableWithSearchInput" type="search" class="form-control"
                                               placeholder="Search users" aria-label="Search users">
                                    </div>
                                    <!-- End Search -->
                                </form>
                                <!-- End Filter -->
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->
                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               data-hs-datatables-options='{
                   "order": [],
                   "search": "#datatableWithSearchInput",
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatableWithSearchPagination"
                 }'>
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Price Offer</th>
                                <th>Processing Time</th>
                                <th>Create At</th>
                                <th>Update At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restaurant->products as $product)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>
                                        <img src="{{asset('restaurant_image/products/'.$product->image)}}" alt="error"  class="avatar avatar-circle"></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->price_offer}}</td>
                                    <td>{{$product->processing_time}}</td>
                                    <td>{{date_format($product->created_at,'Y:m:d && h:i:A')}}</td>
                                    <td>{{date_format($product->updated_at,'Y:m:d && h:i:A')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <!-- Footer -->
                    <div class="card-footer">
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <nav id="datatableWithSearchPagination" aria-label="Activity pagination"></nav>
                        </div>
                        <!-- End Pagination -->
                    </div>
                    <!-- End Footer -->
                </div>

            </div>
            <!--  End Tab2 -->

            <div class="tab-pane fade" id="nav-three-eg2" role="tabpanel" aria-labelledby="nav-three-eg2-tab">

                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-12 col-md">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-header-title">Reviews</h5>
                                </div>
                            </div>

                            <div class="col-auto">
                                <!-- Filter -->
                                <form>
                                    <!-- Search -->
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend input-group-text">
                                            <i class="bi-search"></i>
                                        </div>
                                        <input id="datatableWithSearchInput" type="search" class="form-control"
                                               placeholder="Search users" aria-label="Search users">
                                    </div>
                                    <!-- End Search -->
                                </form>
                                <!-- End Filter -->
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->
                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               data-hs-datatables-options='{
                   "order": [],
                   "search": "#datatableWithSearchInput",
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatableWithSearchPagination"
                 }'>
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Client Name</th>
                                <th>Client Email</th>
                                <th>Client phone</th>
                                <th>Rate</th>
                                <th>Comment</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restaurant->reviews as $review)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$review->name}}</td>
                                    <td>{{$review->email}}</td>
                                    <td>{{$review->phone}}</td>
                                    <td>{{$review->pivot['rate']}}</td>
                                    <td>{{$review->pivot['comment']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                    <!-- Footer -->
                    <div class="card-footer">
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <nav id="datatableWithSearchPagination" aria-label="Activity pagination"></nav>
                        </div>
                        <!-- End Pagination -->
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
            <!--  End Tab3 -->
            <div class="tab-pane fade" id="nav-four-eg2" role="tabpanel" aria-labelledby="nav-four-eg2-tab">
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-12 col-md">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-header-title">Offers</h5>
                                </div>
                            </div>

                            <div class="col-auto">
                                <!-- Filter -->
                                <form>
                                    <!-- Search -->
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend input-group-text">
                                            <i class="bi-search"></i>
                                        </div>
                                        <input id="datatableWithSearchInput" type="search" class="form-control"
                                               placeholder="Search users" aria-label="Search users">
                                    </div>
                                    <!-- End Search -->
                                </form>
                                <!-- End Filter -->
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->
                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               data-hs-datatables-options='{
                   "order": [],
                   "search": "#datatableWithSearchInput",
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatableWithSearchPagination"
                 }'>
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Start Time</th>
                                <th>End Rime</th>
                                <th>Description</th>
                                <th>Create At</th>
                                <th>Update At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($restaurant->offers as $offer)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td><img src="{{asset('restaurant_image/offers/'.$offer->image)}}" alt="error"  class="avatar avatar-circle"></td>
                                    <td>{{$offer->name}}</td>
                                    <td>{{$offer->start_time}}</td>
                                    <td>{{$offer->end_time}}</td>
                                     <td>{{$offer->description}}</td>
                                    <td>{{date_format($offer->created_at,'Y:m:d && h:i:A')}}</td>
                                    <td>{{date_format($offer->updated_at,'Y:m:d && h:i:A')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <!-- Footer -->
                    <div class="card-footer">
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <nav id="datatableWithSearchPagination" aria-label="Activity pagination"></nav>
                        </div>
                        <!-- End Pagination -->
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
            <!--  End Tab4 -->
        </div>
        <!-- End Tab Content -->



    </div>
@endsection





