@extends('backEnd.layouts.master') 
@section('title','Post Edit') 
@section('css')
<style>
    .increment_btn,
    .remove_btn,
    .btn-warning {
        margin-top: -17px;
        margin-bottom: 10px;
    }
</style>
<link href="{{asset('public/backEnd')}}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/backEnd')}}/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css" />
@endsection 
@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('posts.index')}}" class="btn btn-primary rounded-pill">Manage</a>
                </div>
                <h4 class="page-title">Post Edit</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('posts.update')}}" method="POST" class="row" data-parsley-validate="" enctype="multipart/form-data" name="editForm">
                        @csrf
                        <input type="hidden" value="{{$edit_data->id}}" name="id" />
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Post Name *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$edit_data->title }}" id="title" required="" />
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- col-end -->
                        
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="category_id" class="form-label">Categories *</label>
                                <select class="form-control form-select select2 @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" required>
                                    <optgroup>
                                        <option value="">Select..</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($edit_data->category_id==$category->id) selected @endif>{{$category->name}}</option>
                                        @foreach ($category->childrenCategories as $childCategory)<option value="{{$childCategory->id}}" @if($edit_data->category_id==$childCategory->id) selected @endif>- {{$childCategory->name}}</option>
                                        } @endforeach @endforeach
                                    </optgroup>
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- col end -->
                       

                        <div class="col-sm-6 mb-3">
                            <label for="image">Image *</label>
                            <div class="input-group control-group increment">
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                                
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <img src="{{asset($edit_data->image)}}" class="edit-image border" alt="" />
                        </div>
                        <!-- col end -->
                        <div class="col-sm-6">
                            <div class="form-group mb-3">
                                <label for="author_id" class="form-label">Post Creator *</label>
                                <select class="form-control select2 @error('author_id') is-invalid @enderror" name="author_id" value="{{ old('author_id') }}" id="author_id"  required>
                                    <option value="">Select..</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- col end -->
                        
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" rows="6" class="summernote form-control @error('description') is-invalid @enderror">{{$edit_data->description}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- col end -->
                       
                        <div class="col-sm-3 mb-3">
                            <div class="form-group">
                                <label for="status" class="d-block">Status</label>
                                <label class="switch">
                                    <input type="checkbox" value="1" name="status" @if($edit_data->status==1)checked @endif>
                                    <span class="slider round"></span>
                                </label>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- col end -->
                        

                        <!-- col end -->
                        <div>
                            <input type="submit" class="btn btn-success" value="Submit" />
                        </div>
                    </form>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card-->
        </div>
        <!-- end col-->
    </div>
</div>
@endsection 
@section('script')
<script src="{{asset('public/backEnd/')}}/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-validation.init.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/libs/select2/js/select2.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-advanced.init.js"></script>
<!-- Plugins js -->
<script src="{{asset('public/backEnd/')}}/assets/libs//summernote/summernote-lite.min.js"></script>
<script>
    $(".summernote").summernote({
        placeholder: "Enter Your Text Here",
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-increment").click(function () {
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("body").on("click", ".btn-danger", function () {
            $(this).parents(".control-group").remove();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".increment_btn").click(function () {
            var html = $(".clone_price").html();
            $(".increment_price").after(html);
        });
        $("body").on("click", ".remove_btn", function () {
            $(this).parents(".increment_control").remove();
        });
        $('.select2').select2();
    });
    
    // category to sub
    


</script>
 <script type="text/javascript">
    document.forms["editForm"].elements["category_id"].value = "{{$edit_data->category_id}}";
    document.forms["editForm"].elements["author_id"].value = "{{$edit_data->author_id}}";
</script>
@endsection
