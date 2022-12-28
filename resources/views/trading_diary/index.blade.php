@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Trading diary</h1>
            <a href="{{ route('trading_diary.create') }}" class="btn btn-secondary">Thêm mới</a>
        </div>
        {{-- Search form  --}}
        <form class="search-box" method="GET" action="{{route('trading_diary.index') }}">
            <input type="hidden" name="search_box" value="1">
            <input type="text" name="trading_start" value="{{$request->trading_start}}" id="trading_start" placeholder="Ngày bắt đầu" readonly>
            <input type="text" name="trading_end" value="{{$request->trading_end}}" id="trading_end" placeholder="Ngày kết thúc" readonly>
            <button type="submit">Search</button>
            <a href="{{route('trading_diary.index') }}" style="margin-left:1rem;"><i class="fa-solid fa-rotate"></i></a>
            @if ($request->has('tag')) 
                <span class="tagitem" style="float: right;"><a># {{ $request->tag }}</a></span>
            @endif
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm table-main">
                <thead>
                    <tr>
                        <th scope="col" class="col-order">#</th>
                        <th scope="col">Ngày</th>
                        <th scope="col">Tags</th>
                        <th scope="col">View</th>
                        <th scope="col" class="action">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($tradingDiaries) == 0)
                        <tr>
                            <td colspan="5" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @else
                        @foreach ($tradingDiaries as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->trading_date }}</td>
                                <td>
                                    <?php $tags = json_decode($item->tags); ?>
                                    @foreach ($tags as $tagitem)
                                        <span class="tagitem"><a
                                                href="{{ route('trading_diary.index', ['tag' => $tagitem]) }}">{{ trim($tagitem) }}</a></span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('trading_diary.view', $item->id) }}" 
                                    class="view" data-date="{{ $item->trading_date }}">Xem</a>
                                </td>
                                <td class="action">
                                    <a href="{{ route('trading_diary.edit', $item->id) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('trading_diary.delete', $item->id) }}" class="confirm-delete">
                                        <i class="fa-sharp fa-solid fa-xmark"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{ $tradingDiaries->links() }}
        </div>
        <!-- Frame -->
        <div class="modal fade" id="tradingView" tabindex="-1" aria-labelledby="tradingViewlbl" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tradingViewlbl"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <i>No data</i>
                    </div>
                </div>
            </div>
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