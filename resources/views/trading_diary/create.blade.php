@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Trading diary / {{ $tradingDiary->id ? 'Chỉnh sửa' : 'Thêm mới' }}</h1>
        </div>
        <div class="row">
            <div class="col-8">
                <form method="POST"
                    @if (!$tradingDiary->id) action="{{ route('trading_diary.store') }}" @else action="{{ route('trading_diary.update', $tradingDiary->id) }}" @endif>
                    @if ($tradingDiary->id)
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="trading_date" class="form-label">Ngày</label>
                        <input type="text" class="form-control" name="trading_date" id="trading_date"
                            value="{{ old('trading_date', $tradingDiary->trading_date) }}" readonly>
                        @if ($errors->has('trading_date'))
                            <div class="invalid">{{ $errors->first('trading_date') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" class="form-control" name="tags" id="tags"
                            value="{{ old('tags', $tradingDiary->tags) }}">
                        <small>Các tag ghi in hoa và cách nhau bởi dấu phẩy, ví dụ: AAA, SSI</small>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea name="content" id="content" class="content">{{ old('content', $tradingDiary->content) }}</textarea>
                        <input type="hidden" id="ck_image"
                            value="{{ route('trading_diary.image', ['_token' => csrf_token()]) }}">
                        @if ($errors->has('content'))
                            <div class="invalid">{{ $errors->first('content') }}</div>
                        @endif
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
