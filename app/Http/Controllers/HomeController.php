<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\Category;
use App\Gallery;
use App\Contact;

class HomeController extends Controller
{
    public function index()
    {
        // top 5 bai viet moi nhat
        $latest_blogs = Blog::valid()->orderBy('id', 'desc')->take(5)->get();

        return view('home.index', [
            'latest_blogs' => $latest_blogs
        ]);
    }

    public function blogs()
    {
        $categories = Category::with(["blogs" => function($q){
                $q->where('blogs.status', '=', 1);
            }])->valid()->orderBy('sort_order')->get();

        return view('home.list_blog', compact('categories'));
    }

    public function blogDetail($slug) 
    {   
        $blog = Blog::where('slug', $slug)->valid()->first();
        if (!$blog) {
            abort(404);
        }

        // Update view
        Blog::find($blog->id)->update(['view' => ($blog->view + 1)]);

        // Set backbround image for blog
        if ($blog->background != 0) {
            $banner = Gallery::where('id', $blog->background)->first();
            $blog->background_img = asset('upload/images/' . $banner->name);
        } 
        else {
            $blog->background_img = null;
        }
        return view('home.blog_detail', compact('blog'));
    }

    public function about()
    {
        $gallery = Gallery::valid()->where('type', 3)->first();
        $banner = null;
        if ($gallery) {
            $banner = asset('upload/images/'. $gallery->name);
        }
        return view('home.about', compact('banner'));
    }

    public function contact()
    {
        $gallery = Gallery::valid()->where('type', 4)->first();
        $banner = null;
        if ($gallery) {
            $banner = asset('upload/images/'. $gallery->name);
        }
        return view('home.contact', compact('banner'));
    }

    public function sendContact(ContactRequest $request) 
    {
        // Begin transaction
        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ];
            Contact::create($data);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return response()->json([
                'status'=> 'error',
                'message' => 'Đã xảy ra lỗi trong quá trình gửi.'
            ]);
        }          

        return response()->json([
            'status'=> 'success',
            'html' => view('home.send_success', compact('data'))->render()
        ]);
    }
}
