@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories / {{ $category->id? 'Chỉnh sửa': 'Thêm mới' }}</h1>
        </div>
        <div class="row">
            <div class="col-8">
                <form method="POST" @if(!$category->id) action="{{route('category.store')}}" @else action="{{route('category.update', $category->id)}}" @endif>
                    @if($category->id)
                        @method('PUT')
                    @endif 
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $category->name) }}">
                        @if($errors->has('name'))
                            <div class="invalid">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-control" name="status" id="status">
                            <option value="0" {{$category->status==0? 'selected': ''}}>Disable</option>
                            <option value="1" {{$category->status==1? 'selected': ''}}>Active</option>
                        </select>
                        @if($errors->has('status'))
                            <div class="invalid">{{$errors->first('status')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Thứ tự</label>
                        <input type="number" class="form-control" name="sort_order" id="sort_order" value="{{ old('sort_order', $category->sort_order) }}">
                    </div>
                    <button type="submit" class="btn btn-save">Lưu</button>
                </form>
            </div>
            <div class="col-4">
                <div class="card">
                   <div class="card-header">
                        Danh sách các bài viết của danh mục.
                   </div>
                   <div class="card-body">
                        @if($category->blogs->count())
                        <ul>
                            @foreach($category->blogs as $blog)
                            <li><a href="{{route('blog.edit', $blog->id)}}">{{ $blog->title }}</a></li>
                            @endforeach
                        </ul>
                        @else 
                            <i style="color: gray">Không có bài viết nào</i>
                        @endif
                   </div>
                </div>
            </div>
        </div>
    </main>
@endsection
