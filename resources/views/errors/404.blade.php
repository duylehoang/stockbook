@extends('layout_home')
@section('title') Nội dung không tìm thấy @endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>404 <i class="fa-regular fa-face-smile"></i></h1>
                        <p class="subtitle">Nội dung này không tồn tại.</p>
                        <a href="{{route('home.index')}}" class="btn btn-primary">Quay lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection