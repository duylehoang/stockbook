@extends('layout_home')

@section('title') {{$blog->title}} @endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" @if($blog->background_img) style="background-image: url('{{ $blog->background_img }}')" @endif>
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{ $blog->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p class="post-meta post-time">
                        Posted by
                        <a href="{{ route('home.about') }}">Hoàng Duy</a>
                        on {{ $blog->created_at->format('F d, Y') }}
                    </p>
                    @if ($blog->subtitle)
                        <blockquote>{{ $blog->subtitle }}</blockquote>
                    @endif 
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </article>
@endsection