@extends('layout_home')

@section('title') Home @endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('/images/home-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>StockBook.com</h1>
                        <span class="subheading">Một blog cơ bản</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach ($latest_blogs as $blog)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('home.blog.detail', $blog->slug) }}">
                            <h2 class="post-title">{{ $blog->title }}</h2>
                            <h3 class="post-subtitle">{{ $blog->subtitle }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="{{ route('home.about') }}">Hoàng Duy</a>
                            on {{ $blog->created_at->format('F d, Y') }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach

                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary text-uppercase" href="{{ route('home.blog') }}">Xem thêm →</a>
                </div>
            </div>
        </div>
    </div>
@endsection