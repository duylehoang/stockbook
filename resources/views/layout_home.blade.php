<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content=""/>
        <title>@yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
        <!-- Font Awesome-->
        <link rel="stylesheet" href="{{ asset('/lib/fontawesome/css/all.min.css') }}">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{route('home.index')}}">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('home.index')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('home.blog')}}">Danh sách bài viết</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('home.about')}}">Giới thiệu</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('home.contact')}}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        {{-- Popup image  --}}
        <div id="image-viewer">
            <span class="close">&times;</span>
            <img class="modal-content" id="full-image">
        </div>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="https://twitter.com/lehoangduy287" alt="Twitter" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/profile.php?id=100005468643768" alt="Facebook" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://t.me/lehoangduy287" alt="Telegram" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-telegram fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://zalo.me/0397524982" alt="Zalo" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fa-sharp fa-solid fa-comment fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Jquery -->
        <script src="{{ asset('/lib/jquery.min.js') }}"></script>
        <!-- Core Bootstrap JS-->
        <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/home.js') }}"></script>
    </body>
</html>
