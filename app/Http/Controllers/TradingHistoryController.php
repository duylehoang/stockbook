<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TradingHistoryRequest;
use Illuminate\Support\Facades\DB;
use App\TradingHistory;

class TradingHistoryController extends Controller
{
    protected $tradingHistory;

    public function __construct(TradingHistory $tradingHistory)
    {
        $this->middleware('auth');
        $this->tradingHistory = $tradingHistory;
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
            if ($request->code) {
                array_push($condition, ['code', '=', strtoupper($request->code)]);
            }
        }
        if ($request->has('code') && !$request->has('search_box')) {
            array_push($condition, ['code', '=', strtoupper($request->code)]);
        }

        if (count($condition)) {
            $tradingHistories = TradingHistory::where($condition)->orderBy('trading_date')->paginate(20);
        } else {
            $tradingHistories = TradingHistory::orderBy('trading_date')->paginate(20);
        }

        return view('trading_history.index', [
            'request' => $request,
            'tradingHistories' => $tradingHistories
        ]);
    }

    public function create()
    {
        return view('trading_history.create', [
            'tradingHistory' => $this->tradingHistory
        ]);
    }

    public function store(TradingHistoryRequest $request)
    {
        $data = [ 
            'trading_date' => $request->trading_date,
            'code' => $request->code,
            'number' => $request->number,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'profit' => ($request->buy_price - $request->sell_price) * $request->number,
            'number_t' => $request->number_t,
            'note' => $request->note
        ];

        // Begin transaction
        DB::beginTransaction();
        try {
            // Create new category
            $this->tradingHistory = TradingHistory::create($data);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => '???? x???y ra l???i trong qu?? tr??nh l??u'
            ]);
        }

        return redirect()->route('trading_history.index')->with([
            'status'=> 'success',
            'message'=> 'Th??m l???ch s??? th??nh c??ng'
        ]);
    }

    public function edit($id)
    {
        $tradingHistory = TradingHistory::find($id);

        if(!$tradingHistory) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Kh??ng t??m th???y l???ch s???'
            ]);
        }

        return view('trading_history.create', compact('tradingHistory'));
    }

    public function update(TradingHistoryRequest $request, $id)
    {
        $tradingHistory = TradingHistory::find($id);

        if(!$tradingHistory) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Kh??ng t??m th???y l???ch s???'
            ]);
        }

        $data = [ 
            'trading_date' => $request->trading_date,
            'code' => $request->code,
            'number' => $request->number,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'profit' => ($request->sell_price - $request->buy_price) * $request->number,
            'number_t' => $request->number_t,
            'note' => $request->note
        ];

        // Begin transaction
        DB::beginTransaction();
        try {
            $tradingHistory->update($data);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with([
                'status'=> 'error',
                'message' => '???? x???y ra l???i trong qu?? tr??nh l??u'
            ]);
        }

        return redirect()->route('trading_history.index')->with([
            'status'=> 'success',
            'message'=> 'C???p nh???t l???ch s??? th??nh c??ng'
        ]);
    }

    public function delete($id)
    {
        $tradingHistory = TradingHistory::find($id);

        if(!$tradingHistory) {
            return redirect()->back()->with([
                'status'=> 'error',
                'message'=> 'Kh??ng t??m th???y l???ch s???'
            ]);
        }

        $tradingHistory->delete();

        return response()->json([
            'status'=> 'success'
        ]);
    }
}
