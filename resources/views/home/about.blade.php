@extends('layout_home')

@section('title') Về tôi @endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" @if($banner) style="background-image: url('{{ $banner }}')" @endif>
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Giới thiệu</h1>
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
                    <p>Website được hình thành từ những ấp ủ ban đầu nhỏ nhoi. Không chỉ là sự chia sẽ mà còn là cả những giá trị tốt đẹp nhất!</p>
                    <p>Những chia sẽ những kiến thức những trải nghiệm trên thị trường tất cả đều được Dũng giới thiệu bằng tất cả những nhiệt huyết sự chân thành và mong muốn đem đến nhiều giá trị nhất tới Nhà đầu tư.</p>
                    <p class="thankyou">Thank you !</p>
                </div>
            </div>
        </div>
    </article>
@endsection