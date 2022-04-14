@extends('Owner.Layouts.main')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <a class="" href="{{url('owner/employees?type=1')}}" aria-expanded="false">
                            <div class="card gradient-1">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Employees</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{$employee}}</h2>
                                    </div>
                                    <span class="float-right display-5 opacity-5 event-count"><i class="fa fas fa-users"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="" href="{{url('owner/receptionist?type=2')}}" aria-expanded="false">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Receptionist</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$receptionist}}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5 event-count"><i class="icon-user-follow"></i></span>
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="" href="{{url('owner/doctor?type=3')}}" aria-expanded="false">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Doctor</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$doctor}}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5 event-count"><i class="fa fa-medkit"></i></span>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @endsection