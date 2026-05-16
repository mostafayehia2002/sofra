@extends('layouts.dashboard')
@section('title')
    Payment
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
                                <a class="breadcrumb-link" href="javascript:;">Payment</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Show Payment</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">Show Payment</h1>
                </div>
                <!-- End Col -->
                <div class="col-sm-auto">
                    <a class="btn btn-status-danger" href="{{route('home')}}">
                        <i class="bi-chevron-left"></i>
                        Return Back
                    </a>
                    <a href="#AddPayment" class="btn btn-primary" data-bs-toggle="modal" title="Add Payment Type Method">
                        <i class="bi bi-plus fs-4"></i>
                        Add Payment
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
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{$error}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <div class="container-fluid">

            <div class="row">
                <!-- Table -->
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Payment Type Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$payment->name}}</td>
                        <td>{{date_format($payment->created_at,'Y:m:d  && h:i:A')}}</td>
                        <td>{{date_format($payment->updated_at,'Y:m:d  && h:i:A')}}</td>
                        <td>

                            <a href="#UpdatePayment" class="btn btn-secondary click" data-bs-toggle="modal" data-id="{{$payment->id}}" data-name="{{$payment->name}}">
                                <i class="bi bi-pen click" data-id="{{$payment->id}}" data-name="{{$payment->name}}"></i>
                            </a>

                            <a href="{{route('deletePayment',$payment->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete Payment Type')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- End Table -->
                <!--Add payment -->
                <div class="modal fade" id="AddPayment" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add Payment Type Method</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('storePayment')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-4">
                                            <label for="PaymentName" class="form-label">Payment Type Name</label>
                                            <input type="text" class="form-control" name="payment_name" id="PaymentName"
                                                   placeholder="Payment Name" value="{{old('PaymentName')}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-white" data-bs-dismiss="modal">Reset</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end Add model -->


                <!--update payment -->
                <div class="modal fade" id="UpdatePayment" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Update Payment Method</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('updatePayment')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-4">
                                             <input type="hidden" name="id" value="" id="PaymentId">
                                            <label for="PaymentName" class="form-label">Payment Type Name</label>

                                            <input type="text" class="form-control" name="payment_name" id="PaymentName"
                                                   placeholder="Payment Name" value="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-white" data-bs-dismiss="modal">Reset</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end update model -->

            </div>
        </div>

        <script>
            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('click')) {
                    e.preventDefault();
                    document.querySelector('#UpdatePayment .modal-body #PaymentId').value =e.target.getAttribute('data-id');
                    document.querySelector('#UpdatePayment .modal-body #PaymentName').value =e.target.getAttribute('data-name');
                }
            });
        </script>

@endsection


