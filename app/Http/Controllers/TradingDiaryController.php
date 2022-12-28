<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TradingDiaryRequest;
use Illuminate\Support\Facades\DB;
use App\TradingDiary;

class TradingDiaryController extends Controller
{
    protected $tradingDiary;

    public function __construct(TradingDiary $tradingDiary)
    {
        $this->middleware('auth');
        $this->tradingDiary = $tradingDiary;
    }

    public function index(Request $request)
    {
        $condition = array();
        if ($request->has('search_box')) 
        {
            if ($request->trading_start) {
                array_push($condition, ['trading_date', '>=', $request->trading_start]);
            }
            if ($request->trading_end) {
                array_push($condition, ['trading_date', '<=', $request->trading_end]);
            }
        }
        if($request->has('tag')) {
            array_push($condition, ['tags', 'like', '%'. $request->tag . '%']);
        }

        if (count($condition)) {
            $tradingDiaries = TradingDiary::where($condition)->orderBy('trading_date')->paginate(20);
        } else {
            $tradingDiaries = TradingDiary::orderBy('trading_date')->paginate(20);
        }

        return view('trading_diary.index', [
            'request' => $request,
            'tradingDiaries' => $tradingDiaries
        ]);
    }

    public function create()
    {
        return view('trading_diary.create', [
            'tradingDiary' => $this->tradingDiary
        ]);
    }

    public function store(TradingDiaryRequest $request)
    {
        $tags = array();
        if ($request->tags) {
            $tags = trim($request->tags);
            $tags = explode(',', $request->tags);
        }

        $data = [ 
            'trading_date' => $request->trading_date,
            'content' => $request->content,
            'tags' => json_encode($tags),
        ];
        // Begin transaction
        DB::beginTransaction();
        try {
            // Create new category
            $this->tradingDiary = TradingDiary::create($data);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => 'Đã xảy ra lỗi trong quá trình lưu'
            ]);
        }

        return redirect()->route('trading_diary.index')->with([
            'status'=> 'success',
            'message'=> 'Thêm bài viết thành công'
        ]);
    }

    public function edit($id)
    {
        $tradingDiary = TradingDiary::find($id);
        $tradingDiary->tags = implode("," , json_decode($tradingDiary->tags));

        if(!$tradingDiary) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy bài viết'
            ]);
        }

        return view('trading_diary.create', compact('tradingDiary'));
    }

    public function update(TradingDiaryRequest $request, $id)
    {
        $tradingDiary = TradingDiary::find($id);

        if(!$tradingDiary) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy bài viết'
            ]);
        }

        $data = [
            'trading_date' => $request->trading_date,
            'content' => $request->content,
            'tags' => $request->tags? explode(',', $request->tags) : [],
        ];

        // Begin transaction
        DB::beginTransaction();
        try {
            $tradingDiary->update($data);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => 'Đã xảy ra lỗi trong quá trình lưu'
            ]);
        }

        return redirect()->route('trading_diary.index')->with([
            'status'=> 'success',
            'message'=> 'Cập nhật bài viết thành công'
        ]);
    }

    public function delete($id)
    {
        $tradingDiary = TradingDiary::find($id);

        if(!$tradingDiary) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy bài viết'
            ]);
        }

        $tradingDiary->delete();

        return response()->json([
            'status'=> 'success'
        ]);
    }

    public function view($id) 
    {
        $tradingDiary = TradingDiary::find($id);

        if(!$tradingDiary) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Không tìm thấy bài viết'
            ]);
        }

        return view('trading_diary.view', compact('tradingDiary'))->render();
    }

    public function viewAll(Request $request) 
    {
        $start = $request->start;
        $end = $request->end;

        $tradingDiaries = TradingDiary::whereDate('trading_date', '>=' , $start)
            ->whereDate('trading_date', '<=', $end)
            ->orderBy('id')
            ->get();

        return view('trading_diary.view_al;', compact('tradingDiaries'));
    }

    public function uploadImage(Request $request) 
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
            $request->file('upload')->move('upload/trading_diary', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/trading_diary/' . $filenametostore);
            $msg = 'Upload hình ảnh thành công';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        } 
    }

}
