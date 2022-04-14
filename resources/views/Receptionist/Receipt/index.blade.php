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
                                    <input type="hidden" name="delete_url"  id="delete_url" value="{{url('receptionist_user/'.request()->route()->getName().'/delete')}}">
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
                                                <td class="capt-cls">@if($val->employee_id){{$val->employee_id}} @else N/A @endif</td>
                                                <td><a href="{{url('receptionist_user/receipt/detail-list?id='.$val->id)}}" class="btn mb-1 btn-rounded btn-outline-primary card-cls" id="{{$val->id}}" title="Detail"><i class="ti-info"></i></a>
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
        var url = $('#delete_url').val();
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