@extends('frontEnd.layouts.master') 
@section('title',$category->meta_title) 
@push('css')
<link rel="stylesheet" href="{{asset('public/frontEnd/css/jquery-ui.css')}}" />
@endpush 
@push('seo')
<meta name="app-url" content="{{route('category',$category->slug)}}" />
<meta name="robots" content="index, follow" />
<meta name="description" content="{{ $category->meta_description}}" />
<meta name="keywords" content="{{ $category->slug }}" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="product" />
<meta name="twitter:site" content="{{$category->title}}" />
<meta name="twitter:title" content="{{$category->title}}" />
<meta name="twitter:description" content="{{ $category->meta_description}}" />
<meta name="twitter:creator" content="" />
<meta property="og:url" content="{{route('category',$category->slug)}}" />
<meta name="twitter:image" content="{{asset($category->image)}}" />

<!-- Open Graph data -->
<meta property="og:title" content="{{$category->title}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{route('category',$category->slug)}}" />
<meta property="og:image" content="{{asset($category->image)}}" />
<meta property="og:description" content="{{ $category->meta_description}}" />
<meta property="og:site_name" content="{{$category->title}}" />
@endpush 
@section('content')
<div class="breadcrumbs panel z-1 py-2 bg-slate-25 dark:bg-slate-100 dark:bg-opacity-5 dark:text-white">
    <div class="container max-w-xl">
        <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
            <li><a href='index.html'>Home</a></li>
            <li><i class="unicon-chevron-right opacity-50"></i></li>
            <li><a href="{{ route('ourblogs') }}">Blog</a></li>
            <li><i class="unicon-chevron-right opacity-50"></i></li>
            <li><span class="opacity-50">{{ $category->name }}</span></li>
        </ul>
    </div>
</div>

<div class="section py-5 lg:py-7 xl:py-9">
    <div class="container max-w-xl">
        <header class="page-header panel vstack text-center">
            <h1 class="h3 lg:h1">Category: {{ $category->name }}</h1>
            <span class="m-0 opacity-60">Showed {{ $posts->lastItem() }} posts out of {{ $posts->total() }} total under <br class="d-block lg:d-none">
                "{{ $category->name }}" category.</span>
        </header>
        <div class="panel mt-5 lg:mt-7 xl:mt-9">
            <div class="row g-4 xl:g-8">
                <div class="col">
                    <div class="panel text-center">
                        <div class="row gy-9 lg:gy-10 sep-x">
                            @foreach($posts as $index => $value)
                            <div class="col-12">
                                <article class="post type-post panel">
                                    <div class="vstack items-center gap-2 lg:gap-3">
                                        <a class='text-primary fw-normal text-none ft-tertiary' href="{{ route('ourblogs') }}">{{ $value->category->name }}</a>
                                        <h3 class="h4 lg:h3 m-0 lg:w-500px lg:m-auto">
                                            <a class='text-none' href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                        </h3>
                                        <div class="ratio ratio-3x2 rounded my-1 lg:my-2 uc-transition-toggle overflow-hidden">
                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                            <a class='position-cover' data-caption='{{ $value->title }}' href="{{ route('post.details', $value->slug) }}"></a>
                                        </div>
                                        <ul class="post-meta nav-x ft-tertiary justify-center fs-7 md:fs-6">
                                            <li>
                                                <div class="hstack gap-1 ft-tertiary">
                                                    <span class="fst-italic opacity-50">By</span>
                                                    <a href="page-author.html">{{ $value->author ? $value->author->name : 'Admin' }}</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="hstack gap-1 ft-tertiary">
                                                    <span class="fst-italic opacity-50">On</span>
                                                    <span>April 26, 2023</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <p class="fs-6 lg:fs-5 lg:w-500px lg:mx-auto">
                                            {{ Str::limit(strip_tags($value->description), 80) }}
                                        </p>
                                        <a class='btn btn-text text-primary border-bottom d-inline-flex fs-7 lg:fs-6 sm:mt-2' href="{{ route('post.details', $value->slug) }}">Continue reading</a>
                                    </div>
                                </article>
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="nav-pagination pt-3 mt-6 lg:mt-9 border-top border-slate-100 dark:border-slate-800">
                            {{$posts->links('pagination::bootstrap-4')}}
                            {{-- <ul class="nav-x uc-pagination hstack gap-1 justify-center ft-tertiary" data-uc-margin="">
                                <li>
                                    <a href="#"><span class="icon icon-1 unicon-chevron-left"></span></a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="uc-active">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="uc-disabled"><span>…</span></li>
                                <li><a href="#">8</a></li>
                                <li><a href="#">9</a></li>
                                <li>
                                    <a href="#"><span class="icon icon-1 unicon-chevron-right"></span></a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="col-auto d-none lg:d-block">
                    <aside id="sidebar" class="sidebar lg:w-250px xl:w-300px" data-uc-sticky="end: true;">
                        <div class="vstack gap-4">
                            <div class="widget-wrap p-3 bg-slate-25 dark:bg-dark">
                                <div class="widget-heading panel pb-2">
                                    <h5 class="title h5">Featured post</h5>
                                </div>
                                <div class="widget-content mt-2">
                                @foreach ($feature__post as $key=>$value )
                                    <div class="panel text-center">
                                        <div class="ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden">
                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                            <a class='position-cover' data-caption='Pixar Unveils Disney Land of the Dead in New' href="{{ route('post.details', $value->slug) }}"></a>
                                        </div>
                                        <h4 class="h5 mt-3">
                                            <a class='text-none' href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                        </h4>
                                        <p class="fs-6">{!! Str::limit($value->description,30) !!}</p>
                                        <a class='btn btn-text text-primary border-bottom mt-3' href="{{ route('post.details', $value->slug) }}">Read more</a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="widget-wrap p-3 bg-slate-25 dark:bg-dark">
                                <div class="widget-heading panel pb-2">
                                    <h5 class="title h5">Most popular</h5>
                                </div>
                                <div class="widget-content mt-2">
                                    <div class="panel vstack gap-2">
                                        @foreach ($popular_sidebar_blogs as $key => $value)  
                                        <article class="post type-post">
                                            <div class="row g-0">
                                                <div class="w-48px h-48px bg-primary d-inline-flex justify-center items-center text-center">
                                                    <span class="h4 lh-1 text-white">{{ $key + 1 }}</span>
                                                </div>
                                                <div class="col ms-2">
                                                    <h4 class="h6"><a class='text-none' href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a></h4>
                                                </div>
                                            </div>
                                        </article>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="widget-wrap p-3 bg-slate-25 dark:bg-dark">
                                <div class="widget-heading panel pb-2">
                                    <h5 class="title h5">Recent posts</h5>
                                </div>
                                <div class="widget-content mt-2">
                                    <div class="panel vstack gap-2">
                                        @foreach ($latest_sidebar_blogs as $key => $value)  
                                        <article class="post type-post">
                                            <div class="row g-0">
                                                <div class="w-64px xl:w-96px">
                                                    <div class="ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden">
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque" src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                                        <a class='position-cover' data-caption='{{ $value->title }}' href="{{ route('post.details', $value->slug) }}"></a>
                                                    </div>
                                                </div>
                                                <div class="col ms-2">
                                                    <h4 class="h6"><a class='text-none' href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a></h4>
                                                </div>
                                            </div>
                                        </article>
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="widget-wrap p-3 bg-slate-25 dark:bg-dark">
                                <div class="widget-heading panel pb-2">
                                    <h5 class="title h5">Browse by category</h5>
                                </div>
                                <div class="widget-content mt-2">
                                    <nav class="panel nav-y gap-2">
                                        @foreach ($home_categories as $key=>$value )
                                        <a class="hstack justify-between text-none text-dark dark:text-white" href="#">
                                            <span class="cat">{{ $value->name }}</span>
                                            <span class="count ft-tertiary">({{ $value->posts->count() }})</span>
                                        </a>
                                        @endforeach
                                    </nav>
                                </div>
                            </div>
                            <div class="widget-wrap p-3 bg-slate-25 dark:bg-dark">
                                <div class="widget-heading panel pb-2">
                                    <h5 class="title h5">Stay connected</h5>
                                </div>
                                <div class="widget-content mt-2">
                                    <ul class="social-icons nav-x justify-start gap-1 text-slate-900 dark:text-white">
                                        @foreach ($socialicons as $social)  
                                                <li>
                                                    <a class="w-40px h-40px d-inline-flex justify-center items-center rounded-circle border transition-all duration-200 ease-in hover:scale-110" href="{{$social->link}}"><i class="{{ $social->icon }}"></i></a>
                                                 </li>
                                                @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush