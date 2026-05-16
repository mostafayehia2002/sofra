@extends('layouts.dashboard')
@section('title')
    Setting
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
                                <a class="breadcrumb-link" href="javascript:;">Setting</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Show Setting</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">Show Setting</h1>
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
                    <th scope="col">Key</th>
                    <th scope="col">Value</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th scope="row">App Name :</th>
                    @if(!empty($settings))
                        <td>{{$settings->app_name}}</td>
                    @else
                        <td>No Data Found</td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">Commission Rate :</th>
                    @if(!empty($settings))
                        <td>{{$settings->commission_rate}}
                            <em> <==Equivalent==> <strong> <mark>{{$settings->commission_rate*100}}%</mark></strong></em></td>
                    @else
                        <td>No Data Found</td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">Created At</th>
                    @if(!empty($settings))
                        <td>{{date_format($settings->created_at,'Y:m:d  && h:i:A')}}</td>
                    @else
                        <td>No Data Found</td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">Updated At</th>
                    @if(!empty($settings))
                        <td>{{date_format($settings->updated_at,'Y:m:d  && h:i:A')}}</td>
                    @else
                        <td>No Data Found</td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">About App</th>
                    @if(!empty($settings))
                        <td>{{$settings->about_app}}</td>
                    @else
                        <td>No Data Found</td>
                    @endif
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td>
                        Control:
                    </td>
                    <td>
                        @if(empty($settings))
                        <a href="#AddSetting" class="btn btn-primary" data-bs-toggle="modal">
                            <i class="bi bi-plus fs-4"></i>
                        </a>
                        @endif
                        @if(!empty($settings))
                        <a href="#UpdateSetting"  class="btn btn-secondary" data-bs-toggle="modal">
                            <i class="bi bi-pen"> </i>
                        </a>
                            @endif
                    </td>
                </tr>
                </tfoot>
            </table>
            <!-- End Table -->
            <!--Add setting -->
            <div class="modal fade" id="AddSetting" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update Setting</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{route('storeSetting')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-4">
                                        <label for="AppName" class="form-label">App Name</label>
                                        <input type="text" class="form-control" name="app_name" id="AppName"
                                               placeholder="App Name" value="{{old('app_name')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="CommissionRate" class="form-label">Commission Rate</label>
                                        <input type="text" class="form-control" name="commission_rate" id="CommissionRate"
                                               placeholder="Commission Rate" value="{{old('commission_rate')}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="AboutApp" class="form-label">About App</label>
                                        <textarea type="text" class="form-control" name="about_app" id="AboutApp">{{old('about_app')}}</textarea>
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

            <!--update setting -->
            <div class="modal fade" id="UpdateSetting" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update Setting</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{route('updateSetting')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-4">
                                        <input type="hidden" name="id" value="{{$settings->id}}">
                                        <label for="AppName" class="form-label">App Name</label>
                                        <input type="text" class="form-control" name="app_name" id="AppName"
                                               placeholder="App Name" value="{{$settings->app_name}}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="CommissionRate" class="form-label">Commission Rate</label>
                                        <input type="text" class="form-control" name="commission_rate" id="CommissionRate"
                                               placeholder="Commission Rate" value="{{$settings->commission_rate}}" >
                                    </div>
                                    <div class="mb-4">
                                        <label for="AboutApp" class="form-label">About App</label>
                                        <textarea type="text" class="form-control" name="about_app" id="AboutApp">{{$settings->about_app}}</textarea>
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


@endsection

