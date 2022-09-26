<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->middleware('auth');
        $this->category = $category;
    }

    public function index()
    {
        $categories = Category::withCount('blogs')->orderBy('sort_order')->get();

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $this->category->sort_order = Category::max('sort_order') + 1;

        return view('category.create', [
            'category'=> $this->category,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'sort_order'=> $request->sort_order
        ];

        // Begin transaction
        DB::beginTransaction();
        try {
            // Create new category
            $this->category = Category::create($data);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => 'Đã xảy ra lỗi trong quá trình lưu'
            ]);
        }

        return redirect()->route('category.index')->with([
            'status'=> 'success',
            'message'=> 'Thêm Category thành công'
        ]);
    }

    public function edit($id)
    {
        $category = Category::with('blogs')->find($id);

        if(!$category) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy Category'
            ]);
        }
        return view('category.create', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);

        if(!$category) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy Category'
            ]);
        }

        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'sort_order'=> $request->sort_order
        ];

        // Begin transaction
        DB::beginTransaction();
        try {
            // Update the category
            $category->update($data);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => 'Đã xảy ra lỗi trong quá trình lưu'
            ]);
        }

        return redirect()->route('category.index')->with([
            'status'=> 'success',
            'message'=> 'Cập nhật Category thành công'
        ]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if(!$category) {
            return response()->json([
                'status'=> 'error',
                'message'=> 'Không tìm thấy Category'
            ]);
        }

        $count_blogs = $category->blogs->count();
        if($count_blogs > 0) {
            return response()->json([
                'status'=> 'error',
                'message'=> 'Catagory này đã có '. $count_blogs . ' bài viết, bạn không thể xóa.'
            ]);
        }

        $category->delete();

        return response()->json([
            'status'=> 'success'
        ]);
    }
}
