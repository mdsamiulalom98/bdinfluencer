@extends('backEnd.layouts.master')
@section('title','Post Manage')
@section('content')
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('posts.create')}}" class="btn btn-danger rounded-pill"><i class="fe-shopping-cart"></i> Add Post</a>
                </div>
                <h4 class="page-title">Post Manage</h4>
            </div>
        </div>
    </div>       
    <!-- end page title --> 
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4">
                        <form class="custom_form">
                            <div class="form-group">
                                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Search post">
                                <button class="btn  rounded-pill btn-info">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mb-3">
                    
                    <div class="col-sm-2 no-print">
                        <form>
                            <label for="per_page">Items per page:</label>
                            <select name="per_page" class="form-control mt-2" id="per_page" onchange="this.form.submit()">
                                <option value="25" {{ $per_page == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ $per_page == 50 ? 'selected' : '' }}>50</option>
                                <option value="75" {{ $per_page == 75 ? 'selected' : '' }}>75</option>
                                <option value="100" {{ $per_page == 100 ? 'selected' : '' }}>100</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-sm-10">
                        <div class="export-print text-end mt-3">
                            <button onclick="printFunction()"class="no-print btn btn-success"><i class="fa fa-print"></i> Print</button>
                            <button id="export-excel-button" class="no-print btn btn-info"><i class="fas fa-file-export"></i> Export</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive"  id="content-to-export">
                    <table class="table nowrap w-100">
                    <thead>
                        <tr>
                            <th style="width:2%"><div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input checkall" value=""></label>
                            <th style="width:2%">SL</th>
                                    </div></th>
                            <th style="width:10%">Action</th>
                            <th style="width:20%">Name</th>
                            <th style="width:8%">View</th>
                            <th style="width:10%">Category</th>
                            <th style="width:10%">Image</th>
                            <th style="width:14%">Deal & Feature</th>
                            <th style="width:8%">Status</th>
                        </tr>
                    </thead>               
                
                    <tbody>
                        @if($data->count() > 0)
                        @foreach($data as $key=>$value)
                        <tr>
                            <td><input type="checkbox" class="checkbox" value="{{$value->id}}"></td>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <div class="button-list custom-btn-list">
                                    @if($value->status == 1)
                                    <form method="post" action="{{route('posts.inactive')}}" class="d-inline"> 
                                    @csrf
                                    <input type="hidden" value="{{$value->id}}" name="hidden_id">       
                                    <button type="button" class="change-confirm" title="Active"><i class="fe-thumbs-down"></i></button></form>
                                    @else
                                    <form method="post" action="{{route('posts.active')}}" class="d-inline">
                                        @csrf
                                    <input type="hidden" value="{{$value->id}}" name="hidden_id">        
                                    <button type="button" class="change-confirm" title="Inactive"><i class="fe-thumbs-up"></i></button></form>
                                    @endif

                                    <a href="{{route('posts.edit',$value->id)}}" title="Edit"><i class="fe-edit"></i></a>

                                    <form method="post" action="{{route('posts.destroy')}}" class="d-inline">        
                                        @csrf
                                    <input type="hidden" value="{{$value->id}}" name="hidden_id">
                                    <button type="submit" class="delete-confirm" title="Delete"><i class="fe-trash-2"></i></button></form>
                                     <!-- <a href="{{route('posts.edit',$value->id)}}" title="Copy"><i class="fe-copy"></i></a> -->
                                </div>
                            </td>
                            <td>{{$value->title}}</td>
                            <td><a href="{{ route('post.details', $value->slug) }}" target="_blank" class="btn btn-info"><i class="fe-eye"></i></a></td>
                            <td>{{$value->category?$value->category->name:''}}</td>
                            <td><img src="{{asset($value->image)}}" class="backend-image" alt=""></td>
                            <td>
                                <p class="m-0">Featured : {{$value->featured==1?'Yes':'No'}}</p>
                                <p class="m-0">Trending : {{$value->trending==1?'Yes':'No'}}</p>
                                <p class="m-0">Popular : {{$value->popular==1?'Yes':'No'}}</p>
                            </td>
                            <td>@if($value->status==1)<span class="badge bg-soft-success text-success">Active</span> @else <span class="badge bg-soft-danger text-danger">Inactive</span> @endif</td>
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td class="text-center" colspan="10">Result not found</td>
                        </tr>
                        @endif
                     </tbody>
                    </table>
                </div>
                <div class="custom-paginate">
                    {{$data->links('pagination::bootstrap-4')}}
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('script')
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
@endsection
<script>
$(document).ready(function(){
    $(".checkall").on('change',function(){
      $(".checkbox").prop('checked',$(this).is(":checked"));
    });
    
    $(document).on('click', '.trending_update', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        console.log('url',url);
        var post = $('input.checkbox:checked').map(function(){
          return $(this).val();
        });
        var post_ids=post.get();
        if(post_ids.length ==0){
            toastr.error('Please Select A Post First !');
            return ;
        }
        $.ajax({
           type:'GET',
           url:url,
           data:{post_ids},
           success:function(res){
               if(res.status=='success'){
                toastr.success(res.message);
                window.location.reload();
            }else{
                toastr.error('Failed something wrong');
            }
           }
        });
    });
    
    $(document).on('click', '.popular_update', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        console.log('url',url);
        var post = $('input.checkbox:checked').map(function(){
          return $(this).val();
        });
        var post_ids=post.get();
        if(post_ids.length ==0){
            toastr.error('Please Select A Post First !');
            return ;
        }
        $.ajax({
           type:'GET',
           url:url,
           data:{post_ids},
           success:function(res){
               if(res.status=='success'){
                toastr.success(res.message);
                window.location.reload();
            }else{
                toastr.error('Failed something wrong');
            }
           }
        });
    });
    
    $(document).on('click', '.feature_update', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        console.log('url',url);
        var post = $('input.checkbox:checked').map(function(){
          return $(this).val();
        });
        var post_ids=post.get();
        if(post_ids.length ==0){
            toastr.error('Please Select A Post First !');
            return ;
        }
        $.ajax({
           type:'GET',
           url:url,
           data:{post_ids},
           success:function(res){
               if(res.status=='success'){
                toastr.success(res.message);
                window.location.reload();
            }else{
                toastr.error('Failed something wrong');
            }
           }
        });
    });
    $(document).on('click', '.update_status', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var post = $('input.checkbox:checked').map(function(){
          return $(this).val();
        });
        var post_ids=post.get();
        if(post_ids.length ==0){
            toastr.error('Please Select A Post First !');
            return ;
        }
        $.ajax({
           type:'GET',
           url:url,
           data:{post_ids},
           success:function(res){
               if(res.status=='success'){
                toastr.success(res.message);
                window.location.reload();
            }else{
                toastr.error('Failed something wrong');
            }
           }
        });
    });
    
    
})
</script>
<script>
    function printFunction() {
        window.print();
    }
</script>
<script>
    $(document).ready(function() {
        $('#export-excel-button').on('click', function() {
            var contentToExport = $('#content-to-export').html();
            var tempElement = $('<div>');
            tempElement.html(contentToExport);
            tempElement.find('.table').table2excel({
                exclude: ".no-export",
                name: "Order Report" 
            });
        });
    });
</script>
@endsection