@extends('layouts.dashboard')
@section('title')
    Contact Us
@endsection
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
                                <a class="breadcrumb-link" href="javascript:;">Contact Us</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Show Contact Us</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">Show Contact Us</h1>
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
                        <h6 class="card-subtitle mb-2">New Message</h6>
                        <div class="row align-items-center gx-2">
                            <div class="col">
                                <span class="js-counter display-4 text-dark"> {{$newMessages}}</span>
                                <span class="text-body fs-5 ms-1">from {{count($contacts)}}</span>
                            </div>
                            <!-- End Col -->
                            <div class="col-auto">
                                @if(count($contacts)>0)
                                 <span class="badge bg-soft-success text-success p-1">
                                            <i class="bi-graph-up"></i>
                                              % {{$newMessages/count($contacts)*100}}
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
                        <h6 class="card-subtitle mb-2">Complaint Message</h6>
                        <div class="row align-items-center gx-2">
                            <div class="col">
                                <span class="js-counter display-4 text-dark">{{$complaintMessage}}</span>
                                <span class="text-body fs-5 ms-1">from {{count($contacts)}}</span>
                            </div>
                            <div class="col-auto">
                                       @if(count($contacts)>0)
                                        <span class="badge bg-soft-success text-success p-1">
                                            <i class="bi-graph-up"></i>
                                            %{{$complaintMessage/count($contacts)*100}}
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
                        <h6 class="card-subtitle mb-2">Suggestion Message</h6>
                        <div class="row align-items-center gx-2">
                            <div class="col">
                                <span class="js-counter display-4 text-dark">{{$suggestionMessage}} </span>
                                <span class="text-body fs-5 ms-1">from {{count($contacts)}}</span>
                            </div>
                            <div class="col-auto">
                                     @if(count($contacts)>0)
                                        <span class="badge bg-soft-danger text-danger p-1">
                                            <i class="bi-graph-down"></i>
                                            %{{$suggestionMessage/count($contacts)*100}}
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
                        <h6 class="card-subtitle mb-2">enquiry Message</h6>
                        <div class="row align-items-center gx-2">
                            <div class="col">
                                <span class="js-counter display-4 text-dark">{{$enquiryMessage}}</span>

                                <span class="text-body fs-5 ms-1">from {{count($contacts)}}</span>
                            </div>
                            <div class="col-auto">
                                @if(count($contacts)>0)
                                <span class="badge bg-soft-secondary text-secondary p-1">
                                       %{{$enquiryMessage/count($contacts)*100}}
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
                            <h5 class="card-header-title">Message</h5>
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
                        <th>Email</th>
                        <th>phone</th>
                        <th>type</th>
                        <th>Message</th>
                        <th>Create At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                         @foreach($contacts as $contact)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->phone}}</td>
                            <td>{{$contact->type}}</td>
                            <td>
                              <a href="#ShowMessage" class="btn-ghost-info click" data-message="{{$contact->message}}" data-bs-toggle="modal">Message</a>
                            </td>
                            <td>{{date_format($contact->created_at,'Y:m:d  && h:i:A')}}</td>
                            <td>
                                <a href="{{route('deleteContact',$contact->id)}}" class="btn btn-danger" onclick=" return confirm('Are You Sure To Delete Message')">
                                    <i class="bi bi-trash"></i>
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

    <!--update Category -->
    <div class="modal fade" id="ShowMessage" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Show Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="message"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <script>
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('click')) {
                e.preventDefault();
                document.querySelector('.modal-body #message').innerHTML =e.target.getAttribute('data-message');
            }
        });
    </script>
@endsection

