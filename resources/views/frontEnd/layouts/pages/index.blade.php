@extends('frontEnd.layouts.master')
@section('title', 'Welcome to Gigpoly blog forum')
@push('seo')
    <meta name="app-url" content="" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Welcome to Gigpoly blog forum, read, write and update!" />
    <meta name="keywords" content="Gigpoly blog" />

    <!-- Open Graph data -->
    <meta property="og:title" content="Welcome to Gigpoly blog forum, read, write and update!" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://gigpoly.com/" />
    <meta property="og:image" content="{{ asset($generalsetting->white_logo) }}" />
    <meta property="og:description" content="Welcome to Gigpoly blog forum, read, write and update!" />
@endpush
@push('css')
@endpush
@section('content')
    <!-- Main Slider -->
    <div class="boxes-panel panel lg:py-2 bg-slate-50 dark:bg-slate-900">
        <div class="container-full lg:max-w-xl px-0 lg:px-2 mx-auto">
            <div class="row child-cols-12 md:child-cols-6 g-1 lg:g-2 col-match">
                <div>
                    @foreach ($hero_section_posts as $key => $value)
                        @if ($key == 0)
                            <article class="post type-post panel vstack gap-2 lg:gap-3 h-100">
                                <figure class="panel h-100 m-0 d-none md:d-block">
                                    <canvas class="h-100 w-100"></canvas>
                                    <img class="media-cover image" src="{{ asset($value->image) }}"
                                        alt="Pixar Unveils Disney Land of the Dead in New">
                                    <a class='position-cover' href="{{ route('post.details', $value->slug) }}"></a>
                                </figure>
                                <div class="ratio ratio-16x9 rounded d-block md:d-none uc-transition-toggle overflow-hidden">
                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                        src="{{ asset($value->image) }}" alt="Pixar Unveils Disney Land of the Dead in New">
                                    <a class='position-cover' data-caption='Pixar Unveils Disney Land of the Dead in New'
                                        href="{{ route('post.details', $value->slug) }}"></a>
                                </div>
                                <div
                                    class="panel vstack justify-end items-start gap-1 lg:gap-2 p-2 lg:p-4 position-cover text-white bg-gradient-to-t from-black to-transparent">
                                    <h3 class="h5 sm:h4 lg:h2 max-w-600px m-0">
                                        <a class='text-none text-white'
                                            href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                    </h3>
                                    <ul class="post-meta nav-x ft-tertiary gap-2 fs-7 lg:fs-6 d-none lg:d-flex">
                                        <li>
                                            <div class="hstack gap-1 ft-tertiary">
                                                <span class="fst-italic opacity-50">By</span>
                                                <a
                                                    href="{{ route('post.details', $value->slug) }}">{{ $value->author ? $value->author->name : 'Admin' }}</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="hstack gap-1 ft-tertiary">
                                                <span class="fst-italic opacity-50">On</span>
                                                <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @endif
                    @endforeach
                </div>
                <div>
                    <div class="panel hstack md:vstack gap-1 lg:gap-2">
                        @foreach ($hero_section_posts as $key => $value)
                            @if ($key > 0)
                                <div class="w-1/2 md:w-100">
                                    <article class="post type-post panel vstack gap-2 lg:gap-3">
                                        <div
                                            class="ratio ratio-1x1 sm:ratio-3x2 xl:ratio-21x9 rounded uc-transition-toggle overflow-hidden">
                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                            <a class='position-cover' data-caption='{{ $value->title }}'
                                                href="{{ route('post.details', $value->slug) }}"></a>
                                        </div>
                                        <div
                                            class="panel vstack justify-end items-start gap-1 lg:gap-2 p-2 lg:p-4 position-cover text-white bg-gradient-to-t from-black to-transparent">
                                            <div class="hstack gap-1 ft-tertiary fs-7 d-none sm:d-inline-flex">
                                                <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                            </div>
                                            <h3 class="h6 sm:h5 xl:h4 max-w-600px m-0">
                                                <a class='text-none text-white'
                                                    href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- trending section -->
    <div class="slider-panel swiper-parent panel py-4 lg:py-6 lg:pb-0 text-dark dark:text-white">
        <div class="container max-w-xl">
            <header class="panel hstack justify-center items-center mb-2 lg:mb-4">
                <div>
                    <h3 class="h5 md:h4 m-0">Trending now</h3>
                </div>
            </header>
            <div class="panel w-100">
                <div class="swiper swiper-main h-100"
                    data-uc-swiper="items: 2; gap: 8; autoplay:2000; loop:true, dots: .swiper-pagination; disable-class: d-none;"
                    data-uc-swiper-s="items: 3; gap: 16;" data-uc-swiper-m="items: 4; gap: 16;"
                    data-uc-swiper-l="items: 5; gap: 16;">
                    <div class="swiper-wrapper">
                        @foreach ($trending_posts as $key => $value)
                            <div class="swiper-slide">
                                <article class="post type-post panel vstack gap-1 md:gap-2">
                                    <div class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                            src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                        <a class='position-cover' data-caption='{{ $value->title }}'
                                            href="{{ route('post.details', $value->slug) }}"></a>
                                    </div>
                                    <header class="panel vstack gap-narrow text-center">
                                        <div class="hstack gap-1 ft-tertiary fs-7 mx-auto opacity-60 d-none sm:d-inline-flex">
                                            <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                        </div>
                                        <h3 class="h6 lg:h5 m-0">
                                            <a class='text-none'
                                                href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                        </h3>
                                    </header>
                                </article>
                            </div>
                        @endforeach

                    </div>

                    <!-- Add Pagination -->
                    <div class="swiper-pagination position-relative mt-3 md:mt-5 text-primary"></div>

                    <!-- Add Arrows -->

                    <div
                        class="swiper-nav swiper-next btn btn-xs md:btn-md w-32px md:w-40px xl:w-56px h-32px md:h-40px xl:h-56px bg-white text-dark rounded-circle shadow-xs position-absolute top-50 end-0 translate-middle-y me-narrow md:me-4 z-1">
                        <i class="unicon-chevron-right icon-1 md:icon-2"></i>
                    </div>
                    <div
                        class="swiper-nav swiper-prev btn btn-xs md:btn-md w-32px md:w-40px xl:w-56px h-32px md:h-40px xl:h-56px bg-white text-dark rounded-circle shadow-xs position-absolute top-50 start-0 translate-middle-y ms-narrow md:ms-4 z-1">
                        <i class="unicon-chevron-left icon-1 md:icon-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <!-- Image Links -->

    <div class="section py-4 sm:py-6 lg:py-9">
        <div class="container max-w-xl">
            <div class="row justify-between gy-6 gx-2">
                <div class="col lg:max-w-700px xl:max-w-900px">
                    <div class="uc-block-stack panel vstack gap-6 lg:gap-9">
                        @foreach ($home_category_posts as $index => $category)
                                        @if ($index == 0 || $index == 6)
                                            <div class="uc-block panel swiper-parent">
                                                <header
                                                    class="uc-block-header panel hstack justify-between items-center border-top pt-1 xl:pt-3 mb-4 xl:mb-6">
                                                    <div>
                                                        <h3 class="h4 xl:h3 m-0">{{ $category->name }}</h3>
                                                    </div>
                                                    <div>
                                                        <a class='btn btn-text text-primary border-bottom d-inline-flex fs-7 lg:fs-6'
                                                            href='blog-category.html'>View all {{ $category->name }}</a>
                                                    </div>
                                                </header>
                                                <div class="uc-block-content panel">
                                                    <div class="panel vstack gap-2 xl:gap-4">
                                                        <div>
                                                            @foreach ($category->posts as $key => $value)
                                                                @if ($key == 0)
                                                                    <article class="post type-post panel vstack gap-2 lg:gap-3">
                                                                        <div class="ratio ratio-16x9 rounded uc-transition-toggle overflow-hidden">
                                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                src="{{ $value->image }}" alt="{{ $value->title }}">
                                                                            <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                href="{{ route('post.details', $value->slug) }}"></a>
                                                                        </div>
                                                                        <div
                                                                            class="panel vstack justify-end items-start gap-1 lg:gap-2 p-2 lg:p-4 position-cover text-white bg-gradient-to-t from-black to-transparent">
                                                                            <ul class="post-meta nav-x ft-tertiary gap-2 fs-7 lg:fs-6 d-none lg:d-flex">
                                                                                <li>
                                                                                    <div class="hstack gap-1 ft-tertiary">
                                                                                        <span class="fst-italic opacity-50">By</span>
                                                                                        <a
                                                                                            href="{{ route('post.details', $value->slug) }}">{{ $value->author ? $value->author->name : 'Admin' }}</a>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="hstack gap-1 ft-tertiary">
                                                                                        <span class="fst-italic opacity-50">On</span>
                                                                                        <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                            <h3 class="h5 sm:h4 lg:h3 max-w-600px m-0">
                                                                                <a class='text-none text-white'
                                                                                    href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                                            </h3>
                                                                        </div>
                                                                    </article>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div>
                                                            <div class="swiper"
                                                                data-uc-swiper="items: 2; autoplay:2000; loop:true; gap: 16; dots: .swiper-pagination; disable-class: d-none;"
                                                                data-uc-swiper-s="items: 3;" data-uc-swiper-m="items: 4;"
                                                                data-uc-swiper-l="items: 4; gap: 32;">
                                                                <div class="swiper-wrapper">
                                                                    @foreach ($category->posts as $key => $value)
                                                                        @if ($key > 0)
                                                                            <div class="swiper-slide">
                                                                                <article class="post type-post panel vstack gap-1 sm:gap-2">
                                                                                    <div
                                                                                        class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                            src="{{ $value->image }}" alt="{{ $value->title }}">
                                                                                        <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                            href="{{ route('post.details', $value->slug) }}"></a>
                                                                                    </div>
                                                                                    <header class="panel vstack gap-narrow text-center">
                                                                                        <div
                                                                                            class="hstack gap-1 ft-tertiary fs-7 mx-auto opacity-60 d-none sm:d-inline-flex">
                                                                                            <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                                                                        </div>
                                                                                        <h3 class="h6 m-0">
                                                                                            <a class='text-none'
                                                                                                href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                                                        </h3>
                                                                                    </header>
                                                                                </article>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>

                                                                <!-- Add Pagination -->
                                                                <div class="swiper-pagination position-relative mt-3 md:mt-5 text-primary">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($index == 1 || $index == 7)
                                            <div class="uc-block panel">
                                                <header
                                                    class="uc-block-header panel hstack justify-between items-center border-top pt-1 xl:pt-3 mb-4 xl:mb-6">
                                                    <div>
                                                        <h3 class="h4 xl:h3 m-0">{{ $category->name }}</h3>
                                                    </div>
                                                    <div>
                                                        <a class='btn btn-text text-primary border-bottom d-inline-flex fs-7 lg:fs-6'
                                                            href='blog-category.html'>View all {{ $category->name }}</a>
                                                    </div>
                                                </header>
                                                <div class="uc-block-content panel">
                                                    <div class="row g-2 xl:g-4">
                                                        <div class="col-12 sm:col-6">
                                                            @foreach ($category->posts as $key => $value)
                                                                @if ($key == 0)
                                                                    <article class="post type-post panel vstack gap-2 lg:gap-3">
                                                                        <div
                                                                            class="ratio ratio-16x9 sm:ratio-3x4 rounded uc-transition-toggle overflow-hidden">
                                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                src="{{ asset($value->image) }}"
                                                                                alt="Pixar Unveils Disney Land of the Dead in New">
                                                                            <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                href="{{ route('post.details', $value->slug) }}"></a>
                                                                        </div>
                                                                        <div
                                                                            class="panel vstack justify-end items-start gap-1 lg:gap-2 p-2 lg:p-4 position-cover text-white bg-gradient-to-t from-black to-transparent">
                                                                            <ul class="post-meta nav-x ft-tertiary gap-2 fs-7 lg:fs-6 d-none lg:d-flex">
                                                                                <li>
                                                                                    <div class="hstack gap-1 ft-tertiary">
                                                                                        <span class="fst-italic opacity-50">By</span>
                                                                                        <a
                                                                                            href="{{ route('post.details', $value->slug) }}">{{ $value->author ? $value->author->name : 'Admin' }}</a>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="hstack gap-1 ft-tertiary">
                                                                                        <span class="fst-italic opacity-50">On</span>
                                                                                        <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                            <h3 class="h5 xl:h4 m-0">
                                                                                <a class='text-none text-white'
                                                                                    href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                                            </h3>
                                                                        </div>
                                                                    </article>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        <div class="col-6 sm:col-3">
                                                            <div class="vstack gap-2 xl:gap-4">
                                                                @foreach ($category->posts as $key => $value)
                                                                    @if ($key == 1 || $key == 3)
                                                                        <div>
                                                                            <article class="post type-post">
                                                                                <div class="panel vstack gap-1 xl:gap-2">
                                                                                    <div
                                                                                        class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                            src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                                                                        <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                            href="{{ route('post.details', $value->slug) }}"></a>
                                                                                    </div>
                                                                                    <div class="panel vstack items-start gap-1">
                                                                                        <div
                                                                                            class="hstack gap-1 ft-tertiary fs-7 opacity-60 d-none sm:d-inline-flex">
                                                                                            <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                                                                        </div>
                                                                                        <h4 class="h6 m-0"><a class='text-none'
                                                                                                href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                                                        </h4>
                                                                                        <a class='btn btn-text text-primary border-bottom fs-7 pb-narrow xl:mt-1 d-none xl:d-inline-flex'
                                                                                            href="{{ route('post.details', $value->slug) }}">Read
                                                                                            more</a>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                    @endif
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                        <div class="col-6 sm:col-3">
                                                            <div class="vstack gap-2 xl:gap-4">
                                                                @foreach ($category->posts as $key => $value)
                                                                    @if ($key == 2 || $key == 4)
                                                                        <div>
                                                                            <article class="post type-post">
                                                                                <div class="panel vstack gap-1 xl:gap-2">
                                                                                    <div
                                                                                        class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                            src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                                                                        <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                            href="{{ route('post.details', $value->slug) }}"></a>
                                                                                    </div>
                                                                                    <div class="panel vstack items-start gap-1">
                                                                                        <div
                                                                                            class="hstack gap-1 ft-tertiary fs-7 opacity-60 d-none sm:d-inline-flex">
                                                                                            <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                                                                        </div>
                                                                                        <h4 class="h6 m-0"><a class='text-none'
                                                                                                href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                                                        </h4>
                                                                                        <a class='btn btn-text text-primary border-bottom fs-7 pb-narrow xl:mt-1 d-none xl:d-inline-flex'
                                                                                            href="{{ route('post.details', $value->slug) }}">Read
                                                                                            more</a>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                    @endif
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($index == 2 || $index == 8)
                                                <div class="uc-block panel">
                                                    <header
                                                        class="uc-block-header panel hstack justify-between items-center border-top pt-1 xl:pt-3 mb-4 xl:mb-6">
                                                        <div>
                                                            <h3 class="h4 xl:h3 m-0">{{ $category->name }}</h3>
                                                        </div>
                                                        <div>
                                                            <a class='btn btn-text text-primary border-bottom d-inline-flex fs-7 lg:fs-6'
                                                                href='blog-category.html'>View all {{ $category->name }}</a>
                                                        </div>
                                                    </header>
                                                    <div class="uc-block-content panel">
                                                        <div class="panel vstack gap-2 xl:gap-4">
                                                            <div>
                                                                @foreach ($category->posts as $key => $value)
                                                                                        @if ($key == 0)
                                                                                                                <article class="post type-post panel vstack gap-2 lg:gap-4 mb-2">
                                                                                                                    <div class="ratio ratio-16x9 rounded uc-transition-toggle overflow-hidden">
                                                                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                                            src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                                                                                                        <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                                                            href="{{ route('post.details', $value->slug) }}"></a>
                                                                                                                    </div>
                                                                                                                    <div class="panel vstack items-start gap-1 lg:gap-2">
                                                                                                                        <ul class="post-meta nav-x ft-tertiary gap-2 fs-7 lg:fs-6 d-none lg:d-flex">
                                                                                                                            <li>
                                                                                                                                <div class="hstack gap-1 ft-tertiary">
                                                                                                                                    <span class="fst-italic opacity-50">By</span>
                                                                                                                                    <a
                                                                                                                                        href="{{ route('post.details', $value->slug) }}">{{ $value->author ? $value->author->name : 'Admin' }}</a>
                                                                                                                                </div>
                                                                                                                            </li>
                                                                                                                            <li>
                                                                                                                                <div class="hstack gap-1 ft-tertiary">
                                                                                                                                    <span class="fst-italic opacity-50">On</span>
                                                                                                                                    <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                                                                                                                </div>
                                                                                                                            </li>
                                                                                                                        </ul>
                                                                                                                        <h3 class="h5 sm:h4 xl:h3 m-0">
                                                                                                                            <a class='text-none'
                                                                                                                                href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                                                                                        </h3>
                                                                                                                        @php
                                                                                                                            $description_post = App\Models\Post::where(
                                                                                                                                'id',
                                                                                                                                $value->id,
                                                                                                                            )->first();
                                                                                                                            $strippedContent = strip_tags(
                                                                                                                                $description_post->description,
                                                                                                                            );
                                                                                                                        @endphp
                                                                                                                        <p class="fs-6 xl:fs-5 opacity-60 d-none sm:d-block">
                                                                                                                            {{ Str::limit($strippedContent, 120) }}
                                                                                                                        </p>
                                                                                                                        <a class='btn btn-text text-primary border-bottom fs-7 lg:fs-6 mt-1 d-none sm:d-inline-flex'
                                                                                                                            href="{{ route('post.details', $value->slug) }}">Read
                                                                                                                            more</a>
                                                                                                                    </div>
                                                                                                                </article>
                                                                                        @endif
                                                                @endforeach
                                                            </div>
                                                            <div>
                                                                <div class="swiper"
                                                                    data-uc-swiper="items: 2; autoplay:2000; loop:true; gap: 16; dots: .swiper-pagination; disable-class: d-none;"
                                                                    data-uc-swiper-s="items: 3; gap: 16;" data-uc-swiper-l="items: 3; gap: 32;">
                                                                    <div class="swiper-wrapper">
                                                                        @foreach ($category->posts as $key => $value)
                                                                            @if ($key > 0)
                                                                                <div class="swiper-slide">
                                                                                    <article class="post type-post panel vstack gap-1 sm:gap-2">
                                                                                        <div
                                                                                            class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                                                                            <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                                href="{{ route('post.details', $value->slug) }}"></a>
                                                                                        </div>
                                                                                        <header class="panel vstack gap-narrow text-center">
                                                                                            <div
                                                                                                class="hstack gap-1 ft-tertiary fs-7 mx-auto opacity-60 d-none sm:d-inline-flex">
                                                                                                <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                                                                            </div>
                                                                                            <h3 class="h6 m-0">
                                                                                                <a class='text-none'
                                                                                                    href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                                                            </h3>
                                                                                        </header>
                                                                                    </article>
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>

                                                                    <!-- Add Pagination -->
                                                                    <div class="swiper-pagination position-relative mt-3 md:mt-5 text-primary">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif

                                        @if ($index == 3 || $index == 9)
                                                        <div class="uc-block panel">
                                                            <header
                                                                class="uc-block-header panel hstack justify-between items-center border-top pt-1 xl:pt-3 mb-4 xl:mb-6">
                                                                <div>
                                                                    <h3 class="h4 xl:h3 m-0">{{ $category->name }}</h3>
                                                                </div>
                                                                <div>
                                                                    <a class='btn btn-text text-primary border-bottom d-inline-flex fs-7 lg:fs-6'
                                                                        href='blog-category.html'>View all {{ $category->name }}</a>
                                                                </div>
                                                            </header>
                                                            <div class="uc-block-content panel">
                                                                <div class="row g-2 xl:g-4">
                                                                    @php
                                                                        $big_posts = App\Models\Post::limit(1)
                                                                            ->where('category_id', $category->id)
                                                                            ->get();
                                                                    @endphp
                                                                    @foreach ($big_posts as $key => $value)
                                                                        <div class="col-12 sm:col-8">
                                                                            <article class="post type-post panel vstack gap-2 sm:gap-4">
                                                                                <div class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                        src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                                                                    <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                        href="{{ route('post.details', $value->slug) }}"></a>
                                                                                </div>
                                                                                <div class="panel vstack items-start gap-1 lg:gap-2">
                                                                                    <ul class="post-meta nav-x ft-tertiary gap-2 fs-7 lg:fs-6 d-none lg:d-flex">
                                                                                        <li>
                                                                                            <div class="hstack gap-1 ft-tertiary">
                                                                                                <span class="fst-italic opacity-50">By</span>
                                                                                                <a
                                                                                                    href="{{ route('post.details', $value->slug) }}">{{ $value->author ? $value->author->name : 'Admin' }}</a>
                                                                                            </div>
                                                                                        </li>
                                                                                        <li>
                                                                                            <div class="hstack gap-1 ft-tertiary">
                                                                                                <span class="fst-italic opacity-50">On</span>
                                                                                                <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                    <h3 class="h5 sm:h4 lg:h3 m-0">
                                                                                        <a class='text-none'
                                                                                            href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                                                    </h3>
                                                                                    <p class="fs-6 opacity-60 d-none sm:d-block">
                                                                                        {{ Str::limit(strip_tags($value->description), 100) }}
                                                                                    </p>
                                                                                    <a class='btn btn-text text-primary border-bottom fs-7 lg:fs-6 mt-1 d-none sm:d-inline-flex'
                                                                                        href="{{ route('post.details', $value->slug) }}">Read
                                                                                        more</a>
                                                                                </div>
                                                                            </article>
                                                                        </div>
                                                                    @endforeach

                                                                    <div class="col-12 sm:col-4">
                                                                        <div class="hstack sm:vstack gap-2 sm:gap-4">
                                                                            @php
                                                                                $small_posts = App\Models\Post::skip(1)
                                                                                    ->limit(2)
                                                                                    ->where('category_id', $category->id)
                                                                                    ->get();
                                                                            @endphp
                                                                            @foreach ($small_posts as $key => $value)
                                                                                <div class="w-1/2 sm:w-100">
                                                                                    <article class="post type-post">
                                                                                        <div class="panel vstack gap-1 xl:gap-2">
                                                                                            <div
                                                                                                class="ratio ratio-3x2 rounded uc-transition-toggle overflow-hidden">
                                                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                    src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                                                                                <a class='position-cover'
                                                                                                    data-caption='Where a “story” is being told without words'
                                                                                                    href="{{ route('post.details', $value->slug) }}"></a>
                                                                                            </div>
                                                                                            <div class="panel vstack items-start gap-1">
                                                                                                <div
                                                                                                    class="hstack gap-1 ft-tertiary fs-7 opacity-60 d-none sm:d-inline-flex">
                                                                                                    <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y') }}</span>
                                                                                                </div>
                                                                                                <h4 class="h6 xl:h5 m-0"><a class='text-none'
                                                                                                        href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                                                                </h4>
                                                                                                <a class='btn btn-text text-primary border-bottom fs-7 xl:fs-6 pb-narrow xl:pb-1 mt-1 xl:mt-2 d-none lg:d-inline-flex'
                                                                                                    href="{{ route('post.details', $value->slug) }}">Read
                                                                                                    more</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </article>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                        @endif


                                        @if ($index == 4 || $index == 10)
                                                <div class="uc-block panel">
                                                    <header
                                                        class="uc-block-header panel hstack justify-between items-center border-top pt-1 xl:pt-3 mb-4 xl:mb-6">
                                                        <div>
                                                            <h3 class="h4 xl:h3 m-0">{{ $category->name }}</h3>
                                                        </div>
                                                        <div>
                                                            <a class='btn btn-text text-primary border-bottom d-inline-flex fs-7 lg:fs-6'
                                                                href='blog-category.html'>View all {{ $category->name }}</a>
                                                        </div>
                                                    </header>
                                                    <div class="uc-block-content panel overflow-x-hidden">
                                                        <div class="row g-2 xl:g-4">
                                                            <div class="col-12">
                                                                @foreach ($category->posts as $key => $value)
                                                                                        <article class="post type-post panel vstack gap-2 lg:gap-4 mb-2 lg:mb-4">
                                                                                            <div class="ratio ratio-16x9 rounded uc-transition-toggle overflow-hidden">
                                                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                    src="../assets/images/demo-two/img-07.jpg"
                                                                                                    alt="Where a “story” is being told without words">
                                                                                                <a class='position-cover'
                                                                                                    data-caption='Where a “story” is being told without words'
                                                                                                    href="{{ route('post.details', $value->slug) }}"></a>
                                                                                            </div>
                                                                                            <div class="panel vstack items-start gap-1 lg:gap-2">
                                                                                                <ul class="post-meta nav-x ft-tertiary gap-2 fs-7 lg:fs-6 d-none lg:d-flex">
                                                                                                    <li>
                                                                                                        <div class="hstack gap-1 ft-tertiary">
                                                                                                            <span class="fst-italic opacity-50">By</span>
                                                                                                            <a href="{{ route('post.details', $value->slug) }}">{{
                                                                    $value->author ? $value->author->name : 'Admin' }}</a>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <div class="hstack gap-1 ft-tertiary">
                                                                                                            <span class="fst-italic opacity-50">On</span>
                                                                                                            <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d,
                                                                                                                                                                                                                        Y') }}</span>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                                <h3 class="h5 sm:h4 lg:h3 m-0">
                                                                                                    <a class='text-none' href="{{ route('post.details', $value->slug) }}">{{
                                                                    $value->title }}</a>
                                                                                                </h3>
                                                                                                <p class="fs-6 xl:fs-5 opacity-60 d-none sm:d-block">Nisi dignissim tortor
                                                                                                    sed quam sed ipsum ut. Dolor sit amet, consectetur adipiscing elit, sed
                                                                                                    do eiusmod tempor incididunt ut laliqua..</p>
                                                                                                <a class='btn btn-text text-primary border-bottom fs-7 lg:fs-6 mt-1 d-none sm:d-inline-flex'
                                                                                                    href="{{ route('post.details', $value->slug) }}">Read more</a>
                                                                                            </div>
                                                                                        </article>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-12 sm:col-6">
                                                                @foreach ($category->posts as $key => $value)
                                                                                        <article class="post type-post">
                                                                                            <div class="row g-0">
                                                                                                <div class="w-80px xl:w-100px">
                                                                                                    <div
                                                                                                        class="ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden">
                                                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                            src="../assets/images/demo-two/img-08.jpg"
                                                                                                            alt="{{ $value->title }}">
                                                                                                        <a class='position-cover' data-caption='Katy Perry\' s Hairstyles
                                                                                                            Colors Through the Years'
                                                                                                            href="{{ route('post.details', $value->slug) }}"></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col ms-2 sm:ms-3">
                                                                                                    <div
                                                                                                        class="hstack gap-1 ft-tertiary fs-7 opacity-60 mb-1 d-none sm:d-inline-flex">
                                                                                                        <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y')
                                                                                                                                                                                                                    }}</span>
                                                                                                    </div>
                                                                                                    <h4 class="h6 xl:h5 m-0"><a class='text-none'
                                                                                                            href="{{ route('post.details', $value->slug) }}">{{
                                                                    $value->title }}</a></h4>
                                                                                                </div>
                                                                                            </div>
                                                                                        </article>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-12 sm:col-6">
                                                                @foreach ($category->posts as $key => $value)
                                                                    <article class="post type-post">
                                                                        <div class="row g-0">
                                                                            <div class="w-80px xl:w-100px">
                                                                                <div
                                                                                    class="ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden">
                                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                        src="../assets/images/demo-two/img-09.jpg"
                                                                                        alt="How America Became Colonial Leader in Cities">
                                                                                    <a class='position-cover'
                                                                                        data-caption='How America Became Colonial Leader in Cities'
                                                                                        href="{{ route('post.details', $value->slug) }}"></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col ms-2 sm:ms-3">
                                                                                <div
                                                                                    class="hstack gap-1 ft-tertiary fs-7 opacity-60 mb-1 d-none sm:d-inline-flex">
                                                                                    <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y')
                                                                                                                                                                                                }}</span>
                                                                                </div>
                                                                                <h4 class="h6 xl:h5 m-0"><a class='text-none'
                                                                                        href="{{ route('post.details', $value->slug) }}">How America
                                                                                        Became Colonial Leader in Cities</a></h4>
                                                                            </div>
                                                                        </div>
                                                                    </article>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-12 sm:col-6">
                                                                @foreach ($category->posts as $key => $value)
                                                                    <article class="post type-post">
                                                                        <div class="row g-0">
                                                                            <div class="w-80px xl:w-100px">
                                                                                <div
                                                                                    class="ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden">
                                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                        src="../assets/images/demo-two/img-10.jpg"
                                                                                        alt="Pixar Unveils Disney Land of the Dead in New">
                                                                                    <a class='position-cover'
                                                                                        data-caption='Pixar Unveils Disney Land of the Dead in New'
                                                                                        href="{{ route('post.details', $value->slug) }}"></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col ms-2 sm:ms-3">
                                                                                <div
                                                                                    class="hstack gap-1 ft-tertiary fs-7 opacity-60 mb-1 d-none sm:d-inline-flex">
                                                                                    <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y')
                                                                                                                                                                                                }}</span>
                                                                                </div>
                                                                                <h4 class="h6 xl:h5 m-0"><a class='text-none'
                                                                                        href="{{ route('post.details', $value->slug) }}">Pixar Unveils
                                                                                        Disney Land of the Dead in New</a></h4>
                                                                            </div>
                                                                        </div>
                                                                    </article>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-12 sm:col-6">
                                                                @foreach ($category->posts as $key => $value)
                                                                                        <article class="post type-post">
                                                                                            <div class="row g-0">
                                                                                                <div class="w-80px xl:w-100px">
                                                                                                    <div
                                                                                                        class="ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden">
                                                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                            src="../assets/images/demo-two/img-11.jpg"
                                                                                                            alt="{{ $value->title }}">
                                                                                                        <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                                            href="{{ route('post.details', $value->slug) }}"></a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col ms-2 sm:ms-3">
                                                                                                    <div
                                                                                                        class="hstack gap-1 ft-tertiary fs-7 opacity-60 mb-1 d-none sm:d-inline-flex">
                                                                                                        <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d, Y')
                                                                                                                                                                                                                    }}</span>
                                                                                                    </div>
                                                                                                    <h4 class="h6 xl:h5 m-0"><a class='text-none'
                                                                                                            href="{{ route('post.details', $value->slug) }}">{{
                                                                    $value->title }}</a></h4>
                                                                                                </div>
                                                                                            </div>
                                                                                        </article>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif

                                        @if ($index == 5 || $index == 11)
                                                <div class="uc-block panel">
                                                    <header
                                                        class="uc-block-header panel hstack justify-between items-center border-top pt-1 xl:pt-3 mb-4 xl:mb-6">
                                                        <div>
                                                            <h3 class="h4 xl:h3 m-0">{{ $category->name }}</h3>
                                                        </div>
                                                        <div>
                                                            <a class='btn btn-text text-primary border-bottom d-inline-flex fs-7 lg:fs-6'
                                                                href='blog-category.html'>View all {{ $category->name }}</a>
                                                        </div>
                                                    </header>
                                                    <div class="uc-block-content panel">
                                                        <div class="row g-2 xl:g-4">
                                                            <div class="col-12 sm:col order-1">
                                                                @foreach ($category->posts as $key => $value)
                                                                                        <article class="post type-post panel vstack gap-2 sm:gap-3">
                                                                                            <div
                                                                                                class="ratio ratio-16x9 sm:ratio-3x4 rounded uc-transition-toggle overflow-hidden">
                                                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                    src="../assets/images/demo-two/img-02.jpg"
                                                                                                    alt="Where a “story” is being told without words">
                                                                                                <a class='position-cover'
                                                                                                    data-caption='Where a “story” is being told without words'
                                                                                                    href="{{ route('post.details', $value->slug) }}"></a>
                                                                                            </div>
                                                                                            <div
                                                                                                class="panel vstack justify-end items-start gap-1 lg:gap-2 p-2 lg:p-4 position-cover text-white bg-gradient-to-t from-black to-transparent">
                                                                                                <ul class="post-meta nav-x ft-tertiary gap-2 fs-7 lg:fs-6 d-none lg:d-flex">
                                                                                                    <li>
                                                                                                        <div class="hstack gap-1 ft-tertiary">
                                                                                                            <span class="fst-italic opacity-50">By</span>
                                                                                                            <a href="{{ route('post.details', $value->slug) }}">{{
                                                                    $value->author ? $value->author->name : 'Admin' }}</a>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <div class="hstack gap-1 ft-tertiary">
                                                                                                            <span class="fst-italic opacity-50">On</span>
                                                                                                            <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d,
                                                                                                                                                                                                                        Y') }}</span>
                                                                                                        </div>
                                                                                                    </li>
                                                                                                </ul>
                                                                                                <h3 class="h5 xl:h4 m-0">
                                                                                                    <a class='text-none text-white'
                                                                                                        href="{{ route('post.details', $value->slug) }}">Where a “story” is
                                                                                                        being told without words</a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </article>
                                                                @endforeach
                                                            </div>
                                                            <div class="col-6 sm:col-3 order-2 sm:order-0">
                                                                <div class="vstack gap-2 xl:gap-4">
                                                                    <div>
                                                                        @foreach ($category->posts as $key => $value)
                                                                                                        <article class="post type-post">
                                                                                                            <div class="panel vstack gap-1 xl:gap-2">
                                                                                                                <div
                                                                                                                    class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                                                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                                        src="../assets/images/demo-two/img-13.jpg"
                                                                                                                        alt="Katy Perry's Hairstyles Colors Through the Years">
                                                                                                                    <a class='position-cover' data-caption='Katy Perry\' s
                                                                                                                        Hairstyles Colors Through the Years'
                                                                                                                        href="{{ route('post.details', $value->slug) }}"></a>
                                                                                                                </div>
                                                                                                                <div class="panel vstack items-start gap-1">
                                                                                                                    <div
                                                                                                                        class="hstack gap-1 ft-tertiary fs-7 opacity-60 d-none sm:d-inline-flex">
                                                                                                                        <span>{{
                                                                            \Carbon\Carbon::parse($value->created_at)->format('F d,
                                                                                                                                                                                                                                    Y') }}</span>
                                                                                                                    </div>
                                                                                                                    <h4 class="h6 m-0"><a class='text-none'
                                                                                                                            href="{{ route('post.details', $value->slug) }}">Katy
                                                                                                                            Perry's Hairstyles Colors Through the Years</a></h4>
                                                                                                                    <a class='btn btn-text text-primary border-bottom fs-7 pb-narrow xl:mt-1 d-none xl:d-inline-flex'
                                                                                                                        href="{{ route('post.details', $value->slug) }}">Read
                                                                                                                        more</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </article>
                                                                        @endforeach
                                                                    </div>
                                                                    <div>
                                                                        @foreach ($category->posts as $key => $value)
                                                                                                        <article class="post type-post">
                                                                                                            <div class="panel vstack gap-1 xl:gap-2">
                                                                                                                <div
                                                                                                                    class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                                                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                                        src="../assets/images/demo-two/img-14.jpg"
                                                                                                                        alt="How America Became Colonial Leader in Cities">
                                                                                                                    <a class='position-cover'
                                                                                                                        data-caption='How America Became Colonial Leader in Cities'
                                                                                                                        href="{{ route('post.details', $value->slug) }}"></a>
                                                                                                                </div>
                                                                                                                <div class="panel vstack items-start gap-1">
                                                                                                                    <div
                                                                                                                        class="hstack gap-1 ft-tertiary fs-7 opacity-60 d-none sm:d-inline-flex">
                                                                                                                        <span>{{
                                                                            \Carbon\Carbon::parse($value->created_at)->format('F d,
                                                                                                                                                                                                                                    Y') }}</span>
                                                                                                                    </div>
                                                                                                                    <h4 class="h6 m-0"><a class='text-none'
                                                                                                                            href="{{ route('post.details', $value->slug) }}">How
                                                                                                                            America Became Colonial Leader in Cities</a></h4>
                                                                                                                    <a class='btn btn-text text-primary border-bottom fs-7 pb-narrow xl:mt-1 d-none xl:d-inline-flex'
                                                                                                                        href="{{ route('post.details', $value->slug) }}">Read
                                                                                                                        more</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </article>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 sm:col-3 order-3">
                                                                <div class="vstack gap-2 xl:gap-4">
                                                                    <div>
                                                                        @foreach ($category->posts as $key => $value)
                                                                                                        <article class="post type-post">
                                                                                                            <div class="panel vstack gap-1 xl:gap-2">
                                                                                                                <div
                                                                                                                    class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                                                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                                        src="../assets/images/demo-two/img-04.jpg"
                                                                                                                        alt="How America Became Colonial Leader in Cities">
                                                                                                                    <a class='position-cover'
                                                                                                                        data-caption='How America Became Colonial Leader in Cities'
                                                                                                                        href="{{ route('post.details', $value->slug) }}"></a>
                                                                                                                </div>
                                                                                                                <div class="panel vstack items-start gap-1">
                                                                                                                    <div
                                                                                                                        class="hstack gap-1 ft-tertiary fs-7 opacity-60 d-none sm:d-inline-flex">
                                                                                                                        <span>{{
                                                                            \Carbon\Carbon::parse($value->created_at)->format('F d,
                                                                                                                                                                                                                                    Y') }}</span>
                                                                                                                    </div>
                                                                                                                    <h4 class="h6 m-0"><a class='text-none'
                                                                                                                            href="{{ route('post.details', $value->slug) }}">How
                                                                                                                            America Became Colonial Leader in Cities</a></h4>
                                                                                                                    <a class='btn btn-text text-primary border-bottom fs-7 pb-narrow xl:mt-1 d-none xl:d-inline-flex'
                                                                                                                        href="{{ route('post.details', $value->slug) }}">Read
                                                                                                                        more</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </article>
                                                                        @endforeach
                                                                    </div>
                                                                    <div>
                                                                        @foreach ($category->posts as $key => $value)
                                                                                                        <article class="post type-post">
                                                                                                            <div class="panel vstack gap-1 xl:gap-2">
                                                                                                                <div
                                                                                                                    class="ratio ratio-4x3 rounded uc-transition-toggle overflow-hidden">
                                                                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                                                        src="../assets/images/demo-two/img-05.jpg"
                                                                                                                        alt="Pixar Unveils Disney Land of the Dead in New">
                                                                                                                    <a class='position-cover'
                                                                                                                        data-caption='Pixar Unveils Disney Land of the Dead in New'
                                                                                                                        href="{{ route('post.details', $value->slug) }}"></a>
                                                                                                                </div>
                                                                                                                <div class="panel vstack items-start gap-1">
                                                                                                                    <div
                                                                                                                        class="hstack gap-1 ft-tertiary fs-7 opacity-60 d-none sm:d-inline-flex">
                                                                                                                        <span>{{
                                                                            \Carbon\Carbon::parse($value->created_at)->format('F d,
                                                                                                                                                                                                                                    Y') }}</span>
                                                                                                                    </div>
                                                                                                                    <h4 class="h6 m-0"><a class='text-none'
                                                                                                                            href="{{ route('post.details', $value->slug) }}">Pixar
                                                                                                                            Unveils Disney Land of the Dead in New</a></h4>
                                                                                                                    <a class='btn btn-text text-primary border-bottom fs-7 pb-narrow xl:mt-1 d-none xl:d-inline-flex'
                                                                                                                        href="{{ route('post.details', $value->slug) }}">Read
                                                                                                                        more</a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </article>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif




                        @endforeach


                        <div class="uc-block panel">
                            <header
                                class="uc-block-header panel hstack justify-between items-center border-top pt-1 xl:pt-3 mb-4 xl:mb-6">
                                <div>
                                    <h3 class="h4 xl:h3 m-0">Latest news</h3>
                                </div>
                            </header>

                            <div class="uc-block-content panel overflow-x-hidden">
                                <div class="row gy-4 sm:gy-6 lg:gy-8">
                                    @foreach ($latest_home_blogs as $key => $value)
                                                                <div class="col-12">
                                                                    <article class="post type-post panel vstack sm:hstack gap-2 sm:gap-4">
                                                                        <div
                                                                            class="ratio ratio-16x9 sm:ratio-1x1 rounded sm:max-w-350px uc-transition-toggle overflow-hidden">
                                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                                                            <a class='position-cover' data-caption='{{ $value->title }}'
                                                                                href="{{ route('post.details', $value->slug) }}"></a>
                                                                        </div>
                                                                        <div class="panel vstack justify-center items-start text-start gap-1 sm:gap-2">
                                                                            <h3 class="h5 sm:h4 xl:h3 max-w-400px m-0">
                                                                                <a class='text-none' href="{{ route('post.details', $value->slug) }}">{{
                                        $value->title }}</a>
                                                                            </h3>
                                                                            <ul
                                                                                class="post-meta nav-x ft-tertiary justify-center gap-2 fs-7 sm:fs-6 d-none sm:d-flex">
                                                                                <li>
                                                                                    <div class="hstack gap-1 ft-tertiary">
                                                                                        <span class="fst-italic opacity-50">By</span>
                                                                                        <a href="{{ route('post.details', $value->slug) }}">{{
                                        $value->author ? $value->author->name : 'Admin' }}</a>
                                                                                    </div>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="hstack gap-1 ft-tertiary">
                                                                                        <span class="fst-italic opacity-50">On</span>
                                                                                        <span>{{ \Carbon\Carbon::parse($value->created_at)->format('F d,
                                                                                                                                                                                                Y') }}</span>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                            <p class="fs-6 opacity-60 d-none sm:d-block">{{
                                        Str::limit(strip_tags($value->description), 100) }}</p>
                                                                            <a class='btn btn-text text-primary border-bottom mt-1 d-none sm:d-inline-flex fs-7 sm:fs-6'
                                                                                href="{{ route('post.details', $value->slug) }}">Read more</a>
                                                                        </div>
                                                                    </article>
                                                                </div>
                                    @endforeach

                                </div>
                                <div class="nav-loadmore d-flex justify-center mt-6 lg:mt-9">
                                    <a class="btn btn-md btn-primary text-white w-250px" href="#loadmore_posts">Load more
                                        posts</a>
                                </div>
                            </div>

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
                                    @foreach ($feature__post as $key => $value)
                                        <div class="panel text-center">
                                            <div class="ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden">
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                    src="{{ asset($value->image) }}"
                                                    alt="Pixar Unveils Disney Land of the Dead in New">
                                                <a class='position-cover'
                                                    data-caption='Pixar Unveils Disney Land of the Dead in New'
                                                    href="{{ route('post.details', $value->slug) }}"></a>
                                            </div>
                                            <h4 class="h5 mt-3">
                                                <a class='text-none'
                                                    href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                            </h4>
                                            <p class="fs-6">{!! Str::limit($value->description, 30) !!}</p>
                                            <a class='btn btn-text text-primary border-bottom mt-3'
                                                href="{{ route('post.details', $value->slug) }}">Read more</a>
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
                                                    <div
                                                        class="w-48px h-48px bg-primary d-inline-flex justify-center items-center text-center">
                                                        <span class="h4 lh-1 text-white">{{ $key + 1 }}</span>
                                                    </div>
                                                    <div class="col ms-2">
                                                        <h4 class="h6"><a class='text-none'
                                                                href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                        </h4>
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
                                                        <div
                                                            class="ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset($value->image) }}" alt="{{ $value->title }}">
                                                            <a class='position-cover' data-caption='{{ $value->title }}'
                                                                href="{{ route('post.details', $value->slug) }}"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col ms-2">
                                                        <h4 class="h6"><a class='text-none'
                                                                href="{{ route('post.details', $value->slug) }}">{{ $value->title }}</a>
                                                        </h4>
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
                                        @foreach ($home_categories as $key => $value)
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
                                                <a class="w-40px h-40px d-inline-flex justify-center items-center rounded-circle border transition-all duration-200 ease-in hover:scale-110"
                                                    href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a>
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


    <!-- Newsletter -->

    <div class="newsletter-popup" id="newsletter-wrapper">
        <button type="button" class="close-popup" data-dismiss="modal">close<i class="i-escape"></i></button>
        <div class="white-popup">
            <div class="banner-newsletter">
                <img src="http://sojourncellars.lunasoft.com/uploads/site/1/skin/email-newsletter.jpg" alt="">
            </div>
            <div class="kt-popup-newsletter">
                <div class="popup-title">
                    <h1>Join Our List</h1>
                    <p class="notice">To access our</p>
                    <span class="primary"> Highly Rated Wines</span>
                </div>
                <form class="form-subscribe" action="http://sojourncellars.lunasoft.com/sojourncellars.com" method="post"
                    id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate="">
                    <input class="input required email" type="email" value="" placeholder="Enter your email here"
                        name="EMAIL" id="mce-EMAIL">
                    <button class="button" name="subscribe" id="subscribe" type="submit">Join List</button>
                </form>
                <div class="checkbox-bottom">
                    <input id="checkBox" type="checkbox" value="">
                    <label for="checkBox">Don’t show this pop up again <br />Already a Member - <a href="#">Login
                            Now</a></label>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
@endpush
