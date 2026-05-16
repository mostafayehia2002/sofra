@extends('layouts.dashboard')
@section('title')
    Clients
@stop

@section('content')
<!-- Content -->
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-sm mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item">
                            <a class="breadcrumb-link" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="breadcrumb-link" href="javascript:;">Clients</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Show Clients</li>
                    </ol>
                </nav>
                <h1 class="page-header-title">Clients</h1>
            </div>
            <!-- End Col -->
            <div class="col-sm-auto">
                <a class="btn btn-status-danger" href="{{route('home')}}">
                    <i class="bi-chevron-left"></i>
                    Return Back
                </a>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
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
                    <h6 class="card-subtitle mb-2">Total Clients</h6>
                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark">{{count($clients)}}</span>
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
                    <h6 class="card-subtitle mb-2">Active Clients</h6>
                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark">{{$activeClients}}</span>
                            <span class="text-body fs-5 ms-1">from {{count($clients)}}</span>
                        </div>
                        <div class="col-auto">
                                        @if(count($clients)>0)
                                        <span class="badge bg-soft-success text-success p-1">
                                                <i class="bi-graph-up"></i>
                                            % {{ $activeClients /count($clients)*100}}
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
                            <span class="js-counter display-4 text-dark">{{$suspendedClients}} </span>
                            <span class="text-body fs-5 ms-1">from {{count($clients)}}</span>
                        </div>
                        <div class="col-auto">
                                        @if(count($clients)>0)
                                        <span class="badge bg-soft-danger text-danger p-1">
                                                <i class="bi-graph-down"></i>
                                           % {{$suspendedClients/count($clients)*100}}
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
                            <span class="js-counter display-4 text-dark">{{$newClients}}</span>

                            <span class="text-body fs-5 ms-1">from {{count($clients)}}</span>
                        </div>
                        <div class="col-auto">
                            @if(count($clients)>0)
                            <span class="badge bg-soft-secondary text-secondary p-1">
                                % {{$newClients/count($clients)*100}}
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
                        <h5 class="card-header-title">Admins</h5>
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
                    <th>Name</th>
                     <th>Phone</th>
                    <th>Region</th>
                    <th>Status</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($clients as $client)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a class="d-flex align-items-center" href="">
                                <div class="avatar avatar-circle">
                                    <img class="avatar-img"
                                         src="{{asset('client_image/profile/'.$client->photo)}}"
                                         alt="Image Description">
                                </div>
                                <div class="ms-3">
                                    <span class="d-block h5 text-inherit mb-0">
                                        {{$client->name}}
                                    </span>
                                    <span class="d-block fs-5 text-body">{{$client->email}}</span>
                                </div>
                            </a>

                        </td>
                        <td>{{$client->phone}}</td>
                         <td>{{$client->region->name}}</td>
                        <td>
                            @if($client->status=='active')
                                <span class="legend-indicator bg-success"></span>
                            @else
                                <span class="legend-indicator bg-danger"></span>
                            @endif
                            {{$client->status}}
                        </td>
                        <td>{{date_format($client->created_at,'Y:m:d  && h:i:A')}}</td>
                        <td>{{date_format($client->updated_at,'Y:m:d && h:i:A')}}</td>
                        <td>

                            <a href="{{route('deleteClient',$client->id)}}" class="btn btn-danger" onclick=" return confirm('Are You Sure To Delete Client')">
                                <i class="bi bi-trash"></i>
                            </a>
                            <a href="{{route('clientStatus',$client->id)}}" class="btn btn-light" onclick="return confirm('Are You Sure To Change Client Status ')">
                                @if($client->status=='active')
                                    <i class="legend-indicator bg-danger"></i>
                                @else
                                    <i class="legend-indicator bg-success"></i>
                                @endif
                            </a>

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

<!-- End Content -->
@endsection

