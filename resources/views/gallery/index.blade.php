@extends('layout_admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Galleries</h1>
        <a href="{{route('gallery.create')}}" class="btn btn-secondary">Thêm mới</a>
    </div>
    {{-- Search form  --}}
    <form class="search-box" method="GET" action="{{route('gallery.index') }}">
        <input type="hidden" name="search_box" value="1">
        <select name="gallery_type">
            <option value="">-- Loại --</option>
            @foreach (getGalleryTypes() as $key => $type)
                <option value="{{$key}}" {{$request->gallery_type == $key? 'selected': ''}}>{{$type}}</option>
            @endforeach
        </select>
        <select name="gallery_status">
            <option value="">-- Trạng thái --</option>
            <option value="'0'">Disable</option>
            <option value="1">Active</option>
        </select>
        <button type="submit">Search</button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm table-main">
            <thead>
                <tr>
                    <th scope="col" class="col-order">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Loại</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" class="action">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($galleries)==0) 
                    <tr>
                        <td colspan="6" class="text-center">Không có dữ liệu</td>
                    </tr>
                @else 
                @foreach ($galleries as $key=>$item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{asset('upload/images/' . $item->name)}}" alt="" class="img-small"></td>
                        <td>{{ getGalleryType($item->type) }}</td>
                        <td>{{ $item->status==1? 'Active': 'Disable' }}</td>
                        <td class="action">
                            <a href="{{ route('gallery.edit', $item->id) }}">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="{{ route('gallery.delete', $item->id) }}" class="confirm-delete">
                                <i class="fa-sharp fa-solid fa-xmark"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{ $galleries->links() }}
    </div>
</main>
@endsection