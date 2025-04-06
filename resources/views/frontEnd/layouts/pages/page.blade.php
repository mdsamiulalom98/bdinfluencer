@extends('frontEnd.layouts.master')
@section('title','Page')
@section('content')
<div class="breadcrumbs panel z-1 py-2 bg-slate-25 dark:bg-slate-100 dark:bg-opacity-5 dark:text-white">
    <div class="container max-w-xl">
        <ul class="breadcrumb nav-x justify-center gap-1 fs-7 sm:fs-6 m-0">
            <li><a href='index.html'>Home</a></li>
            <li><i class="unicon-chevron-right opacity-50"></i></li>
            <li><a href="{{ route('ourblogs') }}">Page</a></li>
            <li><i class="unicon-chevron-right opacity-50"></i></li>
            <li><span class="opacity-50">{{$page->title}}</span></li>
        </ul>
    </div>
</div>
<section class="clearfix page py-5">
    <div class="container">
        <h1 class="py-2 text-center">{{$page->title}}</h1>
        {!! $page->description !!}                    
    </div>
</section>
@endsection
