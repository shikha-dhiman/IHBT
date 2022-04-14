@extends('Owner.Layouts.main')
@section('content')
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('owner')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)" class="capt-cls">{{request()->route()->getName()}}</a></li>
                    </ol>
                </div>
            </div>
            @if (\Session::has('success'))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                     <div class="alert alert-success">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {!! \Session::get('success') !!}
                     </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-body">
                                    <h4 class="card-title capt-cls">{{request()->route()->getName()}}</h4>
                                    <a href="{{url('owner/'.request()->route()->getName().'/add?type='.request()->input('type'))}}" class="btn btn-rounded btn-icon btn-add-event" id=""><i class="ti-plus"></i></a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Designation</th>
                                                <th>Employee ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user as $key => $val)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td class="capt-cls">{{$val->name}}</td>
                                                <td class="capt-cls">{{$val->mobile}}</td>
                                                <td class="capt-cls">{{$val->designation}}</td>
                                                <td class="capt-cls">{{$val->employee_id}}</td>
                                                <td>@if(request()->input('type') == 1)<a href="{{url('owner/doctor/family?id='.$val->id.'&type='.request()->input('type'))}}" class="btn mb-1 btn-light btn-rounded btn-icon btn-common-pdng btn-add-family" id="{{$val->id}}" title="Click this button to add family member."><i class="icon-people"></i></a>@endif<a href="{{url('owner/employee/card?id='.$val->id.'&type='.request()->input('type'))}}" class="btn mb-1 btn-rounded btn-outline-primary card-cls" id="{{$val->id}}" title="Delete"><i class="ti-credit-card"></i></a><a href="{{url('owner/employee/edit?id='.$val->id.'&type='.request()->input('type'))}}" class="btn btn-success btn-rounded btn-icon btn-common-pdng" title="Edit"><i class="ti-pencil"></i></a>
                                                <a href="" class="btn btn-danger btn-rounded btn-icon btn-common-pdng delete-value" id="{{$val->id}}" title="Delete"><i class="ti-trash"></i></a>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Designation</th>
                                                <th>Employee ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
        @endsection
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function(){
   jQuery(".delete-value").click(function(e){
        e.preventDefault();
        var url = "{{url('owner/employee/delete')}}";
        var id = jQuery(this).attr("id");
        swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this value.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                 jQuery.ajax({
                    type: 'POST',
                    url : url,
                    headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                    data:{id:id},
                    success: function (data) {
                     if(data == "Deleted successfully."){
                        jQuery('#'+id).remove();
                        location.reload();
                        swal("Deleted sucessfully.", "", "success", {
                        icon: "success",
                        });
                     }
                      
                    }
                });
              }
        });    
    });
   });
</script>