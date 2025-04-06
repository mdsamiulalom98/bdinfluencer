@extends('frontEnd.layouts.master')
@section('title',$post->title)
@push('seo')
<meta name="app-url" content="{{route('post.details',$post->slug)}}" />
<meta name="robots" content="index, follow" />
<meta name="description" content="{{ $post->meta_description}}" />
<meta name="keywords" content="{{ $post->slug }}" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="blog" />
<meta name="twitter:site" content="{{$post->title}}" />
<meta name="twitter:title" content="{{$post->title}}" />
<meta name="twitter:description" content="{{$post->meta_description}}" />
<meta name="twitter:creator" content="" />
<meta property="og:url" content="{{route('post.details',$post->slug)}}" />
<meta name="twitter:image" content="{{asset($post->image)}}" />

<!-- Open Graph data -->
<meta property="og:title" content="{{$post->title}}" />
<meta property="og:type" content="blog" />
<meta property="og:url" content="{{route('post.details',$post->slug)}}" />
<meta property="og:image" content="{{asset($post->image)}}" />
<meta property="og:description" content="{{ $post->meta_description}}" />
<meta property="og:site_name" content="{{$post->title}}" />
@endpush 
@section('content')
<div class="breadcrumbs panel z-1 py-2 bg-slate-25 dark:bg-slate-100 dark:bg-opacity-5 dark:text-white">
    <div class="container max-w-xl">
        <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><i class="unicon-chevron-right opacity-50"></i></li>
            <li><a href="{{ route('ourblogs') }}">Blog</a></li>
            <li><i class="unicon-chevron-right opacity-50"></i></li>
            <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
            <li><i class="unicon-chevron-right opacity-50"></i></li>
            <li><span class="opacity-50">{{ $post->title }}</span></li>
        </ul>
    </div>
</div>

<article class="post type-post single-post py-4 lg:py-6 xl:py-9">
    <div class="container max-w-xl mb-5">
        <header class="post-header">
            <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                <div class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                    <ul class="post-meta nav-x ft-tertiary fs-6 d-none md:d-inline-flex">
                        <li>
                            <div class="hstack gap-1 ft-tertiary">
                                <span class="fst-italic opacity-50">By</span>
                                <a href="page-author.html">{{ $post->author ? $post->author->name : 'Admin' }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="hstack gap-1 ft-tertiary">
                                <span class="fst-italic opacity-50">On</span>
                                <span>{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</span>
                            </div>
                        </li>
                        <li>
                            <div class="hstack gap-1 ft-tertiary">
                                <span class="fst-italic opacity-50">In</span>
                                <a class='text-primary' href="{{ route('category', $category->slug) }}">{{ $category ? $category->name : '' }}</a>
                            </div>
                        </li>
                    </ul>
                    <h1 class="h4 sm:h3 xl:h1 m-0">{{ $post->title }}</h1>
                    <ul class="post-share nav-x gap-1">
                        <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                    </ul>
                </div>
                <figure class="featured-image m-0">
                    <div class="ratio ratio-2x1 rounded uc-transition-toggle overflow-hidden">
                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                    </div>
                </figure>
            </div>
        </header>
    </div>
    <hr>
    <div class="panel mt-4 lg:mt-6 xl:mt-9">
        <div class="container max-w-md">
            <div class="post_details post-content panel fs-6 md:fs-5" >
                {!! $post->description !!}
            </div>

            <div class="post-related panel border-top pt-2 mt-8 xl:mt-9">
                <h4 class="h5 xl:h4 mb-5 xl:mb-6">Related to this topic:</h4>
                <div class="row child-cols-6 md:child-cols-3 gx-2 gy-4 sm:gx-3 sm:gy-6">
                    @foreach($posts as $key=>$value)
                    <div>
                        <article class="post type-post panel vstack gap-1">
                            <div class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                <a class='position-cover' data-caption='{{ $value->title }}' href='{{ route('post.details', $value->slug) }}'></a>
                            </div>
                            <header class="panel vstack gap-1">
                                <div class="hstack gap-1 ft-tertiary fs-7 opacity-60">
                                    <span>{{ $value->created_ad }}</span>
                                </div>
                                <h5 class="h6 m-0">
                                    <a class='text-none' href='{{ route('post.details', $value->slug) }}'>{{ $value->title }}</a>
                                </h5>
                            </header>
                        </article>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</article>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".post_details a").attr("target", "_blank");
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        // Submit comment form
        $('#comment-form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('comments.store') }}',
                data: $(this).serialize(),
                success: function (response) {
                    // Handle success, update UI, append new comment
                    // For simplicity, you can reload the entire comments section
                    $('#comments-section').load(window.location.href + ' #comments-section');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        // Submit reply form
        $(document).on('submit', '.reply-form', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('replies.store') }}',
                data: $(this).serialize(),
                success: function (response) {
                    // Handle success, update UI, append new reply
                    // For simplicity, you can reload the entire comments section
                    $('#comments-section').load(window.location.href + ' #comments-section');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endsection 