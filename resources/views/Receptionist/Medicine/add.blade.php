@extends('Receptionist.Layouts.main')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('receptionist_user')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{url()->previous()}}" class="capt-cls">Receipts</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)" class="capt-cls">{{request()->route()->getName()}}</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card">
                            <div class="card-body">
                                @if($errors->any())
                                    <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">Error-{{$errors->first()}}
                                    </div>
                                @endif
                                <div class="">
                                    <form class="" action="" method="post">
                                        @csrf
                                        <input type="hidden" name="add_medicines" value="{{url('receptionist_user/medicines/add_medicines')}}">
                                        <input type="hidden" name="receipt_id" value="{{request()->input('id')}}">
                                        <input type="hidden" name="submit_rows" value="{{url('receptionist_user/medicines/add')}}">
                                        <input type="hidden" name="delete_medicines" value="{{url('receptionist_user/medicines/delete')}}">
                                        <input type="hidden" name="delete_medicines_rows" value="{{url('receptionist_user/medicines/delete_rows')}}">
                                        <h4 class="card-title capt-cls"></h4>
                                         <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="form-row">
                                                    <div class="col-4">
                                                       <select class="form-control medicines">
                                                        @foreach($medicines as $key => $val)
                                                           <option value="{{$val->id}}" >{{$val->name}}</option>
                                                           @endforeach
                                                       </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="text" class="form-control" placeholder="Quantity"  name="quantity" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" >
                                                    </div>
                                                    <div class="col-4">
                                                       <button type="button" class="btn btn-outline-info btn-fw" id="append_data">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                            <div class="table-responsive">
                                              <table class="table table-striped medicine-table" style="width: 66.5%;">
                                                <thead class="medicines-thead">
                                                  <tr>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group row" id="add_quot">
                                            <div class="col-lg-12 ml-auto">
                                                <div class="form-row">
                                                    <div class="col">
                                                       <input  type="button" class="btn btn-primary" id="submit_rows" value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <script type="text/javascript">
          window.onbeforeunload = function() {
                return "Hey, are you sure you want to leave?";
            }
        </script>
        @endsection
       