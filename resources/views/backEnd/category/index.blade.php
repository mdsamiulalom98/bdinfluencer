@extends('backEnd.layouts.master')
@section('title','Category Manage')
@section('css')
<link href="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<style>
    td.handle {
        cursor: grab;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('categories.create')}}" class="btn btn-primary rounded-pill">Create</a>
                </div>
                <h4 class="page-title">Category Manage</h4>
            </div>
        </div>
    </div>       
    <!-- end page title --> 
   <div class="row">
    <div class="col-12">
        <form action="{{ route('categories.sort') }}" method="POST" id="myForm">
            @csrf
            <div class="card">
                <button class="btn btn-dark" style="display: block;" type="submit">Submit Sorting</button>
                <div class="card-body">
                    <table id="sortableTable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>               
                    
                        <tbody>
                            @foreach($data as $key=>$value)
                            <tr class="handle" style="cursor: grab;" data-id="{{ $loop->iteration }}">
                                <input type="hidden" value="{{ $loop->iteration }}" name="sort[]">
                                <td >{{ $value->sort }}</td>
                                <td>
                                    @if ($value->front_view == 1)
                                    <span class="btn btn-dark">{{$value->name}}</span>
                                    @else
                                    <span >{{$value->name}}</span>
                                    @endif
                                </td>
                                <td><img src="{{asset($value->image)}}" class="backend-image" alt=""></td>
                                <td>
                                    @if($value->status==1)
                                    <span class="badge bg-soft-success text-success">Active</span> 
                                    @else 
                                    <span class="badge bg-soft-danger text-danger">Inactive</span> 
                                    @endif
                                </td>
                                @if($value->slug != 'allproducts')
                                <td>
                                    <div class="button-list">
                                        @if($value->status == 1)
                                        <form method="post" action="{{route('categories.inactive')}}" class="d-inline"> 
                                        @csrf
                                        <input type="hidden" value="{{$value->id}}" name="hidden_id">       
                                        <button type="button" class="btn btn-xs  btn-secondary waves-effect waves-light change-confirm"><i class="fe-thumbs-down"></i></button></form>
                                        @else
                                        <form method="post" action="{{route('categories.active')}}" class="d-inline">
                                            @csrf
                                        <input type="hidden" value="{{$value->id}}" name="hidden_id">        
                                        <button type="button" class="btn btn-xs  btn-success waves-effect waves-light change-confirm"><i class="fe-thumbs-up"></i></button></form>
                                        @endif
    
                                        <a href="{{route('categories.edit',$value->id)}}" class="btn btn-xs btn-primary waves-effect waves-light"><i class="fe-edit-1"></i></a>
    
                                        
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
     
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </form>
    </div><!-- end col-->
   </div>
</div>
@endsection


@section('script')
<!-- third party js -->
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{asset('/public/backEnd/')}}/assets/js/pages/datatables.init.js"></script>
<!-- Include Sortable.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    new Sortable(document.getElementById('sortableTable').getElementsByTagName('tbody')[0], {
        animation: 150,
        handle: '.handle', // handle's class
        onEnd: function (evt) {
            // Update the order after dragging
            updateOrder();
        },
    });
});

function updateOrder() {
    console.log('moved');
    // Get the new order and send it to the server (Laravel)
        // Get the form element
    // var form = document.getElementById('myForm');

    // // Submit the form
    // form.submit();
}
</script>
<!-- third party js ends -->
@endsection