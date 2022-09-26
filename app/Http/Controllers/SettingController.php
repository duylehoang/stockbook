<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $profile = Auth::user();
        $users = User::all();
        $mail = getOption('mail_server');

        return view('setting.index', [
            'profile' => $profile,
            'users' => $users,
            'mail' => json_decode($mail)
        ]);
    }

    public function updateProfile(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $auth = Auth::user();
        $auth->name = $request->name;
        $auth->email = $request->email;
        $auth->save();

        return redirect()->back()->with([
            'status'=> 'success',
            'message'=> 'Cập nhật Profile thành công'
        ]);
    }

    public function changePassword(Request $request) 
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            're_password' => 'required|same:new_password|min:6',
        ]);

        $auth = Auth::user();
        
        if (Hash::check($request->old_password, $auth->password)) {
            $auth->password = Hash::make($request->new_password);
            $auth->save();
        } 
        else {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Mật khẩu bạn nhập không chính xác'
            ]);
        }

        return redirect()->back()->with([
            'status'=> 'success',
            'message'=> 'Cập nhật mật khẩu thành công'
        ]);
    }

    public function updateMail(Request $request) {
        $validated = $request->validate([
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'sender_name' => 'required',
            'sender_mail' => 'required',
            'encryption' => 'required'
        ]);

        $data = $request->except('_token');

        setOption('mail_server', json_encode($data));

        return redirect()->back()->with([
            'status'=> 'success',
            'message'=> 'Cập nhật cấu hình Mail thành công'
        ]);
    }

    public function viewClear() 
    {
        try {
            \Artisan::call('view:clear');
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Đã xảy ra lỗi'
            ]);
        }

        return redirect()->back()->with([
            'status'=> 'success',
            'message'=> 'Chạy lênh view:clear thành công'
        ]);
    }

    public function routeClear() 
    {
        try {
            \Artisan::call('route:clear');
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Đã xảy ra lỗi'
            ]);
        }

        return redirect()->back()->with([
            'status'=> 'success',
            'message'=> 'Chạy lênh route:clear thành công'
        ]);
    }

    public function cacheClear()
    {
        try {
            \Artisan::call('cache:clear');
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Đã xảy ra lỗi'
            ]);
        }

        return redirect()->back()->with([
            'status'=> 'success',
            'message'=> 'Chạy lênh cache:clear thành công'
        ]);
    }

    public function configClear()
    {
        try {
            \Artisan::call('config:clear');
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Đã xảy ra lỗi'
            ]);
        }

        return redirect()->back()->with([
            'status'=> 'success',
            'message'=> 'Chạy lênh config:clear thành công'
        ]);
    }

    public function activeUser($id) 
    {
        $user = User::find($id);
        if (!$user) {
            return respone()->json([
                'status'=> 'error',
                'message'=> 'Không tìm thất user'
            ]);
        }

        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }

        $user->save();

        return respone()->json([
            'status'=> 'success',
            'message'=> 'Cập nhật trạng thái thành công'
        ]);
    }
}
