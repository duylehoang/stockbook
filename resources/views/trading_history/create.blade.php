@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Trading history / {{ $tradingHistory->id ? 'Chỉnh sửa' : 'Thêm mới' }}</h1>
        </div>
        <div class="row">
            <div class="col-10">
                <form method="POST"
                    @if (!$tradingHistory->id) action="{{ route('trading_history.store') }}" @else action="{{ route('trading_history.update', $tradingHistory->id) }}" @endif>
                    @if ($tradingHistory->id)
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="trading_date" class="form-label">Ngày</label>
                            <input type="text" class="form-control" name="trading_date" id="trading_date"
                                value="{{ old('trading_date', $tradingHistory->trading_date) }}" readonly>
                            @if ($errors->has('trading_date'))
                                <div class="invalid">{{ $errors->first('trading_date') }}</div>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="code" class="form-label">Mã</label>
                            <input type="text" class="form-control" name="code" id="code"
                                value="{{ old('code', $tradingHistory->code) }}">
                            @if ($errors->has('code'))
                                <div class="invalid">{{ $errors->first('code') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="number" class="form-label">Số lượng</label>
                            <input type="text" class="form-control" name="number" id="number"
                                value="{{ old('number', $tradingHistory->number) }}">
                            @if ($errors->has('number'))
                                <div class="invalid">{{ $errors->first('number') }}</div>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="buy_price" class="form-label">Giá mua</label>
                            <input type="text" class="form-control" name="buy_price" id="buy_price"
                                value="{{ old('buy_price', $tradingHistory->buy_price) }}">
                            @if ($errors->has('buy_price'))
                                <div class="invalid">{{ $errors->first('buy_price') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="sell_price" class="form-label">Giá bán</label>
                            <input type="text" class="form-control" name="sell_price" id="sell_price"
                                value="{{ old('sell_price', $tradingHistory->sell_price) }}">
                            {{-- @if ($errors->has('sell_price'))
                                <div class="invalid">{{ $errors->first('sell_price') }}</div>
                            @endif --}}
                        </div>
                        <div class="col-6">
                            <label for="profit" class="form-label">Lợi nhận</label>
                            <input type="text" class="form-control" name="profit" id="profit"
                                value="{{ old('profit', $tradingHistory->profit) }}">
                            {{-- @if ($errors->has('profit'))
                                <div class="invalid">{{ $errors->first('profit') }}</div>
                            @endif --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="number_t" class="form-label">Số T+</label>
                            <input type="text" class="form-control" name="number_t" id="number_t"
                                value="{{ old('number_t', $tradingHistory->number_t) }}">
                        </div>
                        <div class="col-6">
                            <label for="note" class="form-label">Note</label>
                            <textarea name="note" id="note" rows="5" style="width:100%" 
                                class="form-control">{{ old('note', $tradingHistory->note) }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-save mb-3">Lưu</button>
                </form>
            </div>
        </div>
    </main>
@endsection

@push('page-scripts')
    <script>
        // initialize Date picker
        $('#trading_date').datepicker({
            dateFormat: 'yy-mm-dd',
        });
    </script>
@endpush
