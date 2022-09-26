@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Setting</h1>
        </div>
        <div class="row mb-4">
            <div class="col-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Profile của bạn
                        <i class="fa-sharp fa-solid fa-chevron-down card-toggle"></i>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('setting.profile')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên</label>
                                <input type="name" class="form-control" name="name" id="name" value="{{ old('name', $profile->name) }}">
                                @if($errors->has('name'))
                                    <div class="invalid">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $profile->email) }}">
                                @if($errors->has('email'))
                                    <div class="invalid">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-save">Lưu</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        Thay đổi mật khẩu
                        <i class="fa-sharp fa-solid fa-chevron-down card-toggle"></i>
                    </div>
                    <div class="card-body">
                         <form method="POST" action="{{route('setting.change_password')}}">
                             @csrf
                             <div class="mb-3">
                                 <label for="old_password" class="form-label">Mật khẩu cũ</label>
                                 <input type="password" class="form-control" name="old_password" id="old_password" value="{{ old('old_password') }}">
                                 @if($errors->has('old_password'))
                                     <div class="invalid">{{$errors->first('old_password')}}</div>
                                 @endif
                             </div>
                             <div class="mb-3">
                                 <label for="new_password" class="form-label">Mật khẩu mới</label>
                                 <input type="password" class="form-control" name="new_password" id="new_password" value="{{ old('new_password') }}">
                                 @if($errors->has('new_password'))
                                     <div class="invalid">{{$errors->first('new_password')}}</div>
                                 @endif
                             </div>
                             <div class="mb-3">
                                 <label for="re_password" class="form-label">Nhập lại mật khẩu mới</label>
                                 <input type="password" class="form-control" name="re_password" id="re_password" value="{{ old('confirm_password') }}">
                                 @if($errors->has('re_password'))
                                     <div class="invalid">{{$errors->first('re_password')}}</div>
                                 @endif
                             </div>
                             <button type="submit" class="btn btn-save">Lưu</button>
                         </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Danh sách người dùng
                        <i class="fa-sharp fa-solid fa-chevron-down card-toggle"></i>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th class="action">Action</th>
                                </tr>
                            </thead>
                           <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="action">
                                            @if($user->id != $profile->id)
                                                <a href="{{ route('user.delete', $user->id) }}" class="confirm-delete">
                                                    <i class="fa-sharp fa-solid fa-xmark"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Thiết lập Mail Server
                        <i class="fa-sharp fa-solid fa-chevron-down card-toggle"></i>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('setting.mail')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="mail_host" class="form-label">Host</label>
                                <input type="text" class="form-control" name="mail_host" id="mail_host" value="{{ old('mail_host', $mail->mail_host) }}">
                                @if($errors->has('mail_host'))
                                    <div class="invalid">{{$errors->first('mail_host')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="mail_port" class="form-label">Port</label>
                                <input type="text" class="form-control" name="mail_port" id="mail_port" value="{{ old('mail_port', $mail->mail_port) }}">
                                @if($errors->has('mail_port'))
                                    <div class="invalid">{{$errors->first('mail_port')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="mail_username" class="form-label">UserName</label>
                                <input type="text" class="form-control" name="mail_username" id="mail_username" value="{{ old('mail_username', $mail->mail_username) }}">
                                @if($errors->has('mail_username'))
                                    <div class="invalid">{{$errors->first('mail_username')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="mail_password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="mail_password" id="mail_password" value="{{ old('mail_password', $mail->mail_password) }}">
                                @if($errors->has('mail_password'))
                                    <div class="invalid">{{$errors->first('mail_password')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="sender_name" class="form-label">Sender Name</label>
                                <input type="text" class="form-control" name="sender_name" id="sender_name" value="{{ old('sender_name', $mail->sender_name) }}">
                                @if($errors->has('sender_name'))
                                    <div class="invalid">{{$errors->first('sender_name')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="sender_mail" class="form-label">Sender Mail</label>
                                <input type="text" class="form-control" name="sender_mail" id="sender_mail" value="{{ old('sender_mail', $mail->sender_mail) }}">
                                @if($errors->has('sender_mail'))
                                    <div class="invalid">{{$errors->first('sender_mail')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="encryption" class="form-label">Encryption</label>
                                <input type="text" class="form-control" name="encryption" id="encryption" value="{{ old('encryption', $mail->encryption) }}">
                                @if($errors->has('encryption'))
                                    <div class="invalid">{{$errors->first('encryption')}}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-save">Lưu</button>
                        </form>
                    </div>
                 </div>
                <div class="card mb-3">
                    <div class="card-header">
                        Xóa bộ nhớ đệm
                        <i class="fa-sharp fa-solid fa-chevron-down card-toggle"></i>
                    </div>
                    <div class="card-body cache-clear">
                        <a href="{{route('setting.view_clear')}}">View clear</a>
                        <a href="{{route('setting.route_clear')}}">Route clear</a>
                        <a href="{{route('setting.cache_clear')}}">Cache clear</a>
                        <a href="{{route('setting.config_clear')}}">Config clear</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
