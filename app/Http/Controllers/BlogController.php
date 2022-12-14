<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;
use App\Blog;
use App\Category;
use App\Gallery;

class BlogController extends Controller
{
    protected $blog;

    public function __construct(Blog $blog)
    {
        $this->middleware('auth');
        $this->blog = $blog;
    }

    public function index(Request $request)
    {
        $categories = Category::select('id', 'name')->orderBy('sort_order')->get();

        // Search
        $blogs = Blog::with('category');
        if ($request->has('search_box')) {
            if ($request->category) {
                $blogs = $blogs->where('category_id', $request->category);
            }
            if ($request->search) {
                $txtSearch = $request->search;
                $blogs = $blogs->where(function ($query) use ($txtSearch) {
                    $query->where('title', 'like', '%' . $txtSearch . '%')
                        ->orwhere('subtitle', 'like', '%' . $txtSearch . '%')
                        ->orwhere('slug', 'like', '%' . $txtSearch . '%');
                });
            }
        }
        
        $blogs = $blogs->orderBy('sort_order')->paginate(20);
        
        return view('blog.index', [
            'request' => $request,
            'categories' => $categories,
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        $this->blog->sort_order = Blog::max('sort_order') + 1;
        $categories = Category::valid()->orderBy('sort_order')->get();
        $banners = Gallery::valid()->where('type', 5)->orderBy('sort_order')->get();

        return view('blog.create', [
            'blog'=> $this->blog,
            'categories'=> $categories,
            'banners' => $banners
        ]);
    }

    public function store(BlogRequest $request)
    {
        $data = [
            'title' => $request->title,
            'slug' => str_replace(' ', '', $request->slug),
            'subtitle' => $request->subtitle,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'content' => $request->content,
            'background' => (int) substr($request->background, 3, 1), // remove prefix "bg_"
            'view' => $request->view,
            'sort_order'=> $request->sort_order
        ];

        // Begin transaction
        DB::beginTransaction();
        try {
            // Create new category
            $this->blog = Blog::create($data);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => '???? x???y ra l???i trong qu?? tr??nh l??u'
            ]);
        }

        return redirect()->route('blog.index')->with([
            'status'=> 'success',
            'message'=> 'Th??m b??i vi???t th??nh c??ng'
        ]);
    }

    public function edit($id)
    {
        $blog = Blog::with('category')->find($id);

        if(!$blog) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Kh??ng t??m th???y b??i vi???t'
            ]);
        }

        $categories = Category::valid()->orderBy('sort_order')->get();
        $banners = Gallery::valid()->where('type', 5)->orderBy('sort_order')->get();

        return view('blog.create', compact('blog', 'categories', 'banners'));
    }

    public function update(BlogRequest $request, $id)
    {
        $blog = Blog::find($id);

        if(!$blog) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Kh??ng t??m th???y b??i vi???t'
            ]);
        }

        $data = [
            'title' => $request->title,
            'slug' => str_replace(' ', '', $request->slug),
            'subtitle' => $request->subtitle,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'content' => $request->content,
            'background' => (int) substr($request->background, 3, 1), // remove prefix "bg_"
            'view' => $request->view,
            'sort_order'=> $request->sort_order
        ];

        // Begin transaction
        DB::beginTransaction();
        try {
            $blog->update($data);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => '???? x???y ra l???i trong qu?? tr??nh l??u'
            ]);
        }

        return redirect()->route('blog.index')->with([
            'status'=> 'success',
            'message'=> 'C???p nh???t b??i vi???t th??nh c??ng'
        ]);
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if(!$blog) {
            return response()->json([
                'status'=> 'error',
                'message'=> 'Kh??ng t??m th???y b??i vi???t'
            ]);
        }

        $blog->delete();

        return response()->json([
            'status'=> 'success'
        ]);
    }

    public function uploadBlogImage(Request $request) 
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move('upload/images', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/images/' . $filenametostore);
            $msg = 'Upload h??nh ???nh th??nh c??ng';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        } 
    }
}
