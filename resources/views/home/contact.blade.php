@extends('layout_home')

@section('title') Liên hệ @endsection

@section('content')
    <div class="overloading">
        <div class="loader"></div>
    </div>
    <!-- Page Header-->
    <header class="masthead" @if($banner) style="background-image: url('{{ $banner }}')" @endif>
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Liên hệ với tôi</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7" id="contact_container">
                    <div class="mb-3" style="font-style: italic">Nếu bạn có bất cứ thắc mắc nào, bạn có thể gửi phản hồi bằng cách điền vào mẫu bên dưới:</div>
                    <form method="POST" action="{{route('home.contact.send')}}" id="sendContact">
                        @csrf 
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên của bạn:</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Tên của bạn">
                            <div class="invalid" id="error_name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail của bạn:</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="E-mail của bạn">
                            <div class="invalid" id="error_email"></div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Ghi chú:</label>
                            <textarea name="message" id="message" rows="5" class="form-control"></textarea>
                            <div class="invalid" id="error_message"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
@endsection