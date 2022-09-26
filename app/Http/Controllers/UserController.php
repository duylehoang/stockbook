<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if(!$user) {
            return response()->json([
                'status'=> 'error',
                'message'=> 'Không tìm thấy user'
            ]);
        }

        $user->delete();

        return response()->json([
            'status'=> 'success'
        ]);
    }
}
