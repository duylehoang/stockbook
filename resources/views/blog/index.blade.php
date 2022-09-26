@extends('layout_admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Blogs</h1>
        <a href="{{route('blog.create')}}" class="btn btn-secondary">Thêm mới</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm table-main" id="table-blogs">
            <thead>
                <tr>
                    <th scope="col" class="col-order">#</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tiêu đề phụ</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">View</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" class="action">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($blogs)==0) 
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr>
                @else 
                @foreach ($blogs as $item)
                    <tr>
                        <td>{{ $item->sort_order }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->subtitle }}</td>
                        <td><a href="{{route('home.blog.detail', $item->slug)}}">{{ $item->slug }}</a></td>
                        <td>{{ $item->category->name }}</td>
                        <td class="text-center">{{ $item->view }}</td>
                        <td>{{ $item->status==1? 'Active': 'Disable' }}</td>
                        <td class="action">
                            <a href="{{ route('blog.edit', $item->id) }}">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="{{ route('blog.delete', $item->id) }}" class="confirm-delete">
                                <i class="fa-sharp fa-solid fa-xmark"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{ $blogs->links() }}
    </div>
</main>
@endsection