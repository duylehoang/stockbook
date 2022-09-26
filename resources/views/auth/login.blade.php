<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard</title>
    <link href="{{asset('/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/admin.css')}}">
    <!-- Favicons -->
    <link rel="icon" href="{{asset('/images/favicon.ico')}}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="w-50">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        @if(Session::has('status') && Session::get('status')=='error')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{Session::get('message')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        @endif
                        <form method="POST" action="{{route('login.post')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            </div>
                            <div class="mb-3">
                                <label for="pasword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="pasword" name="password">
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('/lib/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
