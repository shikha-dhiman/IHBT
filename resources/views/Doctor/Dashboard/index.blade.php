@extends('Doctor.Layouts.main')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <a class="" href="{{url('doctor/receipts')}}" aria-expanded="false">
                            <div class="card gradient-1">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Today's receipts</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{$todays_receipt}}</h2>
                                    </div>
                                    <span class="float-right display-5 opacity-5 event-count"><i class="icon-doc"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a class="" href="{{url('doctor/receipts')}}" aria-expanded="false">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Total receipts</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{$total_receipt}}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5 event-count"><i class="icon-doc"></i></span>
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