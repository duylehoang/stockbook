@extends('layout_home')

@section('title') Home @endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" @if($banner) style="background-image: url('{{ $banner }}')" @endif>
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Danh sách bài viết</h1>
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
                    @foreach ($categories as $key=>$category)
                        @if($category->blogs->count() > 0)
                            <div class="card {{$key!==0? 'mt-3': null }}">
                                <div class="card-header">
                                    {{$category->name}}
                                    <i class="fa-sharp fa-solid fa-chevron-down card-toggle"></i>
                                </div>
                                <div class="card-body">
                                    <ol>
                                        @foreach($category->blogs as $blog)
                                        <li>
                                            <a href="{{route('home.blog.detail', $blog->slug)}}">{{$blog->title}}</a>
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </article>
@endsection