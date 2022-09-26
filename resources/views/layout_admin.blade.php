<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link href="{{ asset('/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('/images/favicon.ico') }}">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="{{ asset('/lib/fontawesome/css/all.min.css') }}">
    <!-- IziToast -->
    <link rel="stylesheet" href="{{ asset('lib/iziToast/iziToast.min.css') }}">

</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{route('home.index')}}">StockBook</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap signout">
                <a class="nav-link px-3" href="{{ route('logout') }}">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item @if (isCurrentRouteName('dashboard')) active @endif">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item @if (isCurrentRouteName('category.index,category.create,category.edit')) active @endif">
                            <a class="nav-link" href="{{ route('category.index') }}">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item @if (isCurrentRouteName('blog.index,blog.create,blog.edit')) active @endif">
                            <a class="nav-link" href="{{ route('blog.index') }}">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Blogs
                            </a>
                        </li>
                        <li class="nav-item @if (isCurrentRouteName('contact.index')) active @endif">
                            <a class="nav-link" href="{{ route('contact.index') }}">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Contacts
                            </a>
                        </li>
                        <li class="nav-item @if (isCurrentRouteName('gallery.index,gallery.create,gallery.edit')) active @endif">
                            <a class="nav-link" href="{{ route('gallery.index') }}">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Galleries
                            </a>
                        </li>
                        <li class="nav-item @if (isCurrentRouteName('setting.index')) active @endif">
                            <a class="nav-link" href="{{ route('setting.index') }}">
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Setting
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')
            <div class="extensions">
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="delModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="delModalLabel">Xác nhận xóa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc muốn xóa đối tượng này?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="button" id="deleteButton" class="btn btn-danger">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Images Frame -->
                <div class="modal fade" id="imageFrame" tabindex="-1" aria-labelledby="imageFramelbl"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageFramelbl">Duyệt hình ảnh</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <i>No data</i>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- IziToast -->
    <script src="{{ asset('lib/iziToast/iziToast.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Jquery -->
    <script src="{{ asset('/lib/jquery.min.js') }}"></script>
    <!-- CKEditor -->
    <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script>
    <!-- js -->
    <script src="{{ asset('/js/admin.js') }}"></script>

    <!-- Flash message -->
    <script type="text/javascript">
        @if (Session::has('status'))
            let status = "{{ Session::get('status') }}";
            let message = "{{ Session::get('message') }}";
            switch (status) {
                case "success":
                    iziToast.success({
                        title: "Thông báo",
                        message: message,
                        position: 'topRight'
                    });
                    break;
                case "warning":
                    iziToast.warning({
                        title: "cảnh báo",
                        message: message,
                        position: 'topRight'
                    });
                    break;
                case "error":
                    iziToast.error({
                        title: "Lỗi",
                        message: message,
                        position: 'topRight',
                    });
                    break;
                default:
                    break;
            }
        @endif
    </script>
</body>

</html>
