
@extends('layouts.dashboard')
@section('title')
    Show Restaurants
@endsection
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                           href="">Page</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="">Restaurants</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Show Restaurants</li>
                        </ol>
                    </nav>
                    <h2 class="page-header-title">Show Restaurants</h2>
                </div>

                <div class="col-auto">
                    <a class="btn btn-primary" href="">
                        <i class="bi-person-plus-fill me-1"></i>
                    </a>

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
        <!-- Stats -->
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2">Total Restaurants</h6>
                        <div class="row align-items-center gx-2">
                            <div class="col">
                                <span class="js-counter display-4 text-dark">{{count($restaurants)}}</span>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2">Open Restaurant</h6>
                        <div class="row align-items-center gx-2">
                            <div class="col">
                                <span class="js-counter display-4 text-dark">{{$open}}</span>
                                <span class="text-body fs-5 ms-1">from {{count($restaurants)}}</span>
                            </div>
                            <div class="col-auto">
                                @if(count($restaurants)>0)
                                    <span class="badge bg-soft-success text-success p-1">
                                                <i class="bi-graph-up"></i>
                                            % {{ $open /count($restaurants)*100}}
                                        </span>
                                @endif
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2">Suspended Clients</h6>
                        <div class="row align-items-center gx-2">
                            <div class="col">
                                <span class="js-counter display-4 text-dark">{{$closed}} </span>
                                <span class="text-body fs-5 ms-1">from {{count($restaurants)}}</span>
                            </div>
                            <div class="col-auto">
                                @if(count($restaurants)>0)
                                    <span class="badge bg-soft-danger text-danger p-1">
                                                <i class="bi-graph-down"></i>
                                           % {{$closed/count($restaurants)*100}}
                                        </span>
                                @endif
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2">New Client Per Day</h6>
                        <div class="row align-items-center gx-2">
                            <div class="col">
                                <span class="js-counter display-4 text-dark">{{$newRestaurant}}</span>

                                <span class="text-body fs-5 ms-1">from {{count($restaurants)}}</span>
                            </div>
                            <div class="col-auto">
                                @if(count($restaurants)>0)
                                    <span class="badge bg-soft-secondary text-secondary p-1">
                                % {{$newRestaurant/count($restaurants)*100}}
                            </span>
                                @endif
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-12 col-md">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-header-title">Restaurants</h5>
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
                        <th>Restaurant Name</th>
                        <th>Status</th>
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($restaurants as $restaurant)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                <a class="d-flex align-items-center" href="{{route('restaurantProfile',$restaurant->id)}}">
                                    <div class="avatar avatar-circle">
                                        <img class="avatar-img"
                                             src="{{asset('restaurant_image/profile/'.$restaurant->image)}}"
                                             alt="Image Description">
                                    </div>
                                    <div class="ms-3">
                                    <span class="d-block h5 text-inherit mb-0">{{$restaurant->name}}
                                        <i class="bi-patch-check-fill text-primary" data-toggle="tooltip"
                                                       data-bs-placement="top" title="Top endorsed"></i>
                                    </span>
                                        <span class="d-block fs-5 text-body">{{$restaurant->email}}</span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                @if($restaurant->status=='open')
                                    <span class="legend-indicator bg-success"></span>
                                @else
                                    <span class="legend-indicator bg-danger"></span>
                                @endif
                                {{$restaurant->status}}
                            </td>
                            <td>{{date_format($restaurant->created_at,'Y:m:d && h:i:A')}}</td>
                            <td>{{date_format($restaurant->updated_at,'Y:m:d && h:i:A')}}</td>
                            <td>
                                <a href="{{route('deleteRestaurant',$restaurant->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete Restaurant')">
                                    <i class="bi bi-trash"></i>
                                </a>
                                    <form action="{{route('restaurantStatus')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$restaurant->id}}">
                                        <button type="submit" class="btn btn-light" title="change status" style="margin-top:5px">
                                            @if($restaurant->status=='open')
                                                <span class="legend-indicator bg-danger"></span>
                                            @else
                                                <span class="legend-indicator bg-success"></span>
                                        @endif
                                    </form>
                            </td>
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
@endsection
