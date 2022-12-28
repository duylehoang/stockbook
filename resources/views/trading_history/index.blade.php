@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Trading history</h1>
            <a href="{{ route('trading_history.create') }}" class="btn btn-secondary">Thêm mới</a>
        </div>
        {{-- Search form  --}}
        <form class="search-box" method="GET" action="{{route('trading_history.index') }}">
            <input type="hidden" name="search_box" value="1">
            <input type="text" name="trading_start" value="{{$request->trading_start}}" id="trading_start" placeholder="Ngày bắt đầu" readonly>
            <input type="text" name="trading_end" value="{{$request->trading_end}}" id="trading_end" placeholder="Ngày kết thúc" readonly>
            <input type="text" name="code" value="{{$request->code}}" placeholder="Mã">
            <button type="submit">Search</button>
            <a href="{{route('trading_history.index') }}" style="margin-left:1rem;"><i class="fa-solid fa-rotate"></i></a>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm table-main">
                <thead>
                    <tr>
                        <th scope="col" class="col-order">#</th>
                        <th scope="col">Ngày</th>
                        <th scope="col">Mã</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá mua</th>
                        <th scope="col">Giá bán</th>
                        <th scope="col">Lợi nhuận</th>
                        <th scope="col" class="text-center">T+</th>
                        <th scope="col" class="col-note">Note</th>
                        <th scope="col" class="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($tradingHistories) == 0)
                        <tr>
                            <td colspan="10" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @else
                        @foreach ($tradingHistories as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->trading_date }}</td>
                                <td>
                                    <span class="tagitem">
                                        <a href="{{ route('trading_history.index', ['code' => $item->code]) }}">{{ $item->code }}</a>
                                    </span>
                                </td>
                                <td>{{ number_format($item->number) }}</td>
                                <td>{{ number_format($item->buy_price) }}</td>
                                <td>{{ $item->sell_price ? number_format($item->sell_price) : '--' }}</td>
                                <td>{{ $item->sell_price ? number_format($item->profit): '--' }}</td>
                                <td class="text-center">{{ $item->number_t }}</td>
                                <td class="col-note">{{$item->note}}</td>
                                <td class="action">
                                    <a href="{{ route('trading_history.edit', $item->id) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('trading_history.delete', $item->id) }}" class="confirm-delete">
                                        <i class="fa-sharp fa-solid fa-xmark"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $tradingHistories->links() }}
        </div>
    </main>
@endsection

@push('page-scripts')
    <script>
        // initialize Date picker
        $('#trading_start').datepicker({
            dateFormat: 'yy-mm-dd',
        });
        $('#trading_end').datepicker({
            dateFormat: 'yy-mm-dd',
        });
    </script>
@endpush