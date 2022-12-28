<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Setting;
use Illuminate\Support\Facades\Route;

if (!function_exists('isCurrentRouteName')) {
    function iscurrentRouteName($names)
    {
        $names = array_map('trim', explode(',', $names));
        return in_array(Route::currentRouteName(), $names, true);
    }
}

if (!function_exists('getGalleryTypes')) {
    function getGalleryTypes()
    {
        $types = [
            1 => 'Banner trang chủ',
            2 => 'Banner DS bài viết',
            3 => 'Banner về tôi',
            4 => 'Banner liên hệ',
            5 => 'Banner bài viết',
            6 => 'Hình ảnh bài viết'
        ];

        return $types;
    }
}

if (!function_exists('getGalleryType')) {
    function getGalleryType($type)
    {
        $type_name = '';
        switch ($type) {
            case 1:
                $type_name = 'Banner trang chủ';
                break;
            case 2:
                $type_name = 'Banner DS bài viết';
                break;
            case 3:
                $type_name = 'Banner về tôi';
                break;
            case 4:
                $type_name = 'Banner liên hệ';
                break;
            case 5:
                $type_name = 'Banner bài viết';
                break;
            case 6:
                $type_name = 'Hình ảnh bài viết';
                break;
            default:
                # code...
                break;
        }
        return $type_name;
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $original_name = $file->getClientOriginalName('image');
            $name_to_store = randomString() . "_" . $original_name;
            //nếu file tồn tại
            while (file_exists('upload/images/' . $name_to_store)) {
                $name_to_store = randomString() . "_" . $original_name; //thì random tên mới
            }
            $file->move('upload/images', $name_to_store);
            
            return $name_to_store;
        } else {
            return null;
        }
    }
}


if (!function_exists('randomString')) {
    function randomString($length = 4)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}


if (!function_exists('getOption')) {
    function getOption($name)
    {
        $setting = Setting::where('name', $name)->first();
        if (!$setting) {
            return null;
        } 

        return $setting->value;
    }
}

if (!function_exists('setOption')) {
    function setOption($name, $value)
    {
        $setting = Setting::where('name', $name)->first();

        if (!$setting) {
            Setting::insert([
                'name' => $name,
                'value'=> $value
            ]);
        } else {
            $setting->value = $value;
            $setting->save();
        }
    }
}

if (!function_exists('getBanner')) {
    function getBanner($type)
    {
        $banner = DB::table('galleries')->where('type', $type)->where('status', 1)->first();
        if($banner) {
            return asset('upload/images/' . $banner->name);
        } 

        return null;
    }
}