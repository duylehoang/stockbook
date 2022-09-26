@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card text-bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Thống kê bài viết</h5>
                        <div class="card-text">Có 123 bài viết được đăng</div>
                        <div class="card-text">Có 123 bài viết có nhiều hơn 100 lượt xem</div>
                        <br>
                        <a href="#" class="btn btn-light">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Thống kê liên hệ</h5>
                        <div class="card-text">Có tổng cộng 123 lượt liên hệ.</div>
                        <div class="card-text">Có 12 lượt liên hệ trong 6 tháng qua</div>
                        <br>
                        <a href="#" class="btn btn-light">Xem thêm</a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-4">
                <div class="card text-bg-light">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-light">Xem thêm</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </main>
@endsection
