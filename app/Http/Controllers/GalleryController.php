<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Gallery;

class GalleryController extends Controller
{
    protected $gallery;

    public function __construct(Gallery $gallery)
    {
        $this->middleware('auth');
        $this->gallery = $gallery;
    }

    public function index(Request $request)
    {
        $condition = array();
        if ($request->has('search_box')) 
        {
            if ($request->gallery_type) {
                array_push($condition, ['type', $request->gallery_type]);
            }
            if ($request->gallery_status) {
                array_push($condition, ['status', $request->gallery_status]);
            }
        }

        if(count($condition)) {
            $galleries = Gallery::where($condition)->orderBy('type')->orderBy('sort_order')->paginate(20);
        } else {
            $galleries = Gallery::orderBy('type')->orderBy('sort_order')->paginate(20);
        }

        return view('gallery.index', [
            'request' => $request,
            'galleries' => $galleries
        ]);
    }

    public function create()
    {
        $this->gallery->sort_order = Gallery::max('sort_order') + 1;

        return view('gallery.create', [
            'gallery'=> $this->gallery
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required',
            'type' => 'required',
            'status'=> 'required'
        ]);

        // Begin transaction
        DB::beginTransaction();
        try {

            $image_name = uploadImage($request);
            if ($image_name) {
                // Create new gallery
                $this->category = Gallery::create([
                    'name' => $image_name,
                    'type' => $request->type,
                    'status' => $request->status,
                    'sort_order' => $request->sort_order
                ]);
            }
            
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => 'Đã xảy ra lỗi trong quá trình lưu'
            ]);
        }

        return redirect()->route('gallery.index')->with([
            'status'=> 'success',
            'message'=> 'Thêm hình ảnh thành công'
        ]);
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);

        if(!$gallery) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy hình ảnh'
            ]);
        }
        return view('gallery.create', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        if(!$gallery) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy Category'
            ]);
        }

        $validated = $request->validate([
            'type' => 'required',
            'status'=> 'required'
        ]);

        // Begin transaction
        DB::beginTransaction();
        try {
            $image_name = uploadImage($request);
            if ($image_name) {
                unlink("upload/images/" . $gallery->name);
                $gallery->name = $image_name;
            }
            $gallery->status = $request->status;
            $gallery->type = $request->type;
            $gallery->sort_order = $request->sort_order;
            $gallery->save();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => 'Đã xảy ra lỗi trong quá trình lưu'
            ]);
        }

        return redirect()->route('gallery.index')->with([
            'status'=> 'success',
            'message'=> 'Cập nhật hình ảnh thành công'
        ]);
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);
        if(!$gallery) {
            return response()->json([
                'status'=> 'error',
                'message'=> 'Không tìm thấy hình ảnh'
            ]);
        }
        unlink("upload/images/" . $gallery->name);
        $gallery->delete();

        return response()->json([
            'status'=> 'success'
        ]);
    }

    public function getImageFrame()
    {
        $images = Gallery::valid()->where('type', 6)->orderBy('sort_order')->get();
        return view('gallery.frame', compact('images'))->render();
    }
}
