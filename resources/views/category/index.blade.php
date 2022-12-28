@extends('layout_admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        <a href="{{route('category.create')}}" class="btn btn-secondary">Thêm mới</a>
    </div>
    <form class="search-box" method="GET" action="{{route('category.index') }}">
        <input type="hidden" name="search_box" value="1">
        <input type="text" name="search" placeholder="search..." value="{{$request->search}}">
        <button type="submit">Search</button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm table-main">
            <thead>
                <tr>
                    <th scope="col" class="col-order">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Số bài viết của danh mục</th>
                    <th scope="col" class="action">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($categories)==0) 
                    <tr>
                        <td colspan="5" class="text-center">Không có dữ liệu</td>
                    </tr>
                @else 
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $item->sort_order }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->status==1? 'active': 'disable' }}</td>
                        <td>{{ $item->blogs_count }}</td>
                        <td class="action">
                            <a href="{{ route('category.edit', $item->id) }}">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="{{ route('category.delete', $item->id) }}" class="confirm-delete">
                                <i class="fa-sharp fa-solid fa-xmark"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</main>
@endsection