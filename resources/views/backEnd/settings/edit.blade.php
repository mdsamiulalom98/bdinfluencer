@extends('backEnd.layouts.master')
@section('title','General Setting Update')
@section('css')
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
                    <a href="{{route('settings.index')}}" class="btn btn-primary rounded-pill">Manage</a>
                </div>
                <h4 class="page-title">General Setting Update</h4>
            </div>
        </div>
    </div>       
    <!-- end page title --> 
   <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('settings.update')}}" method="POST" class=row data-parsley-validate=""  enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$edit_data->id}}">
                    <div class="col-sm-6">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $edit_data->name}}" id="name" required="">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col-end -->
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="white_logo" class="form-label">White Logo *</label>
                            <input type="file" class="form-control @error('white_logo') is-invalid @enderror" name="white_logo" value="{{ old('white_logo') }}"  id="white_logo" >
                            <img src="{{asset($edit_data->white_logo)}}" class="edit-image" alt="">
                            @error('white_logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="dark_logo" class="form-label">Dark Logo *</label>
                            <input type="file" class="form-control @error('dark_logo') is-invalid @enderror" name="dark_logo" value="{{ old('dark_logo') }}"  id="dark_logo" >
                            <img src="{{asset($edit_data->dark_logo)}}" class="edit-image" alt="">
                            @error('dark_logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="favicon" class="form-label">Favicon Logo *</label>
                            <input type="file" class="form-control @error('favicon') is-invalid @enderror" name="favicon" value="{{ old('favicon') }}"  id="favicon" >
                            <img src="{{asset($edit_data->favicon)}}" class="edit-image" alt="">
                            @error('favicon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="payment_method" class="form-label">Payment Method Image *</label>
                            <input type="file" class="form-control @error('payment_method') is-invalid @enderror" name="payment_method" value="{{ old('payment_method') }}"  id="payment_method" >
                            <img src="{{asset($edit_data->payment_method)}}" class="edit-image" alt="">
                            @error('payment_method')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="qr_code" class="form-label">QR Code Image *</label>
                            <input type="file" class="form-control @error('qr_code') is-invalid @enderror" name="qr_code" value="{{ old('qr_code') }}"  id="qr_code" >
                            <img src="{{asset($edit_data->qr_code)}}" class="edit-image" alt="">
                            @error('qr_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="play_store" class="form-label">Play Store Image *</label>
                            <input type="file" class="form-control @error('play_store') is-invalid @enderror" name="play_store" value="{{ old('play_store') }}"  id="play_store" >
                            <img src="{{asset($edit_data->play_store)}}" class="edit-image" alt="">
                            @error('play_store')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="app_store" class="form-label">App Store Image *</label>
                            <input type="file" class="form-control @error('app_store') is-invalid @enderror" name="app_store" value="{{ old('app_store') }}"  id="app_store" >
                            <img src="{{asset($edit_data->app_store)}}" class="edit-image" alt="">
                            @error('app_store')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    <!-- col end -->
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label for="copyright" class="form-label">Footer Copyright *</label>
                            <input type="text" class="form-control @error('copyright') is-invalid @enderror" name="copyright" value="{{ $edit_data->copyright}}" id="copyright" required="">
                            @error('copyright')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-sm-6">
                        <div class="form-group mb-3">
                            <label for="developed_by" class="form-label">Developed By *</label>
                            <input type="text" class="form-control @error('developed_by') is-invalid @enderror" name="developed_by" value="{{ $edit_data->developed_by}}" id="developed_by" required="">
                            @error('developed_by')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col-end -->
                    <div class="col-sm-6">
                        <div class="form-group mb-3">
                            <label for="developed_by_link" class="form-label">Developed By Website *</label>
                            <input type="text" class="form-control @error('developed_by_link') is-invalid @enderror" name="developed_by_link" value="{{ $edit_data->developed_by_link}}" id="developed_by_link" required="">
                            @error('developed_by_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col-end -->
                    <!-- col end -->
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label for="whatsapp_api" class="form-label">Whatsapp API *</label>
                            <input type="text" class="form-control @error('whatsapp_api') is-invalid @enderror" name="whatsapp_api" value="{{ $edit_data->whatsapp_api }}" id="whatsapp_api" required="">
                            @error('whatsapp_api')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- col end -->
                    
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label for="live_chat" class="form-label">Live Chat Code *</label>
                            <textarea name="live_chat" rows="6" class="form-control @error('live_chat') is-invalid @enderror" required>{{$edit_data->live_chat}}</textarea>
                            @error('live_chat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label for="description" class="form-label">Meta Description *</label>
                            <textarea name="description" rows="6" class="summernote form-control @error('description') is-invalid @enderror" required>{{$edit_data->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="footer_desc" class="form-label">Footer Text *</label>
                                <textarea name="footer_desc" rows="6" class="summernote form-control @error('footer_desc') is-invalid @enderror" required>{{$edit_data->footer_desc}}</textarea>
                                @error('footer_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    
                    <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="newsletter_desc" class="form-label">Newsletter Text *</label>
                                <textarea name="newsletter_desc" rows="6" class="summernote form-control @error('newsletter_desc') is-invalid @enderror" required>{{$edit_data->newsletter_desc}}</textarea>
                                @error('newsletter_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                    <div class="col-sm-6 mb-3">
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
                    <div>
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>

                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
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
@endsection