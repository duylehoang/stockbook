@extends('layout_home')

@section('title') Về tôi @endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" @if($banner) style="background-image: url('{{ $banner }}')" @endif>
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Về tôi</h1>
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
                    
                </div>
            </div>
        </div>
    </article>
@endsection