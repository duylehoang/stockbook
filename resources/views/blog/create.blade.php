@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Blogs / {{ $blog->id? 'Chỉnh sửa': 'Thêm mới' }}</h1>
        </div>
        <form method="POST" @if(!$blog->id) action="{{route('blog.store')}}" @else action="{{route('blog.update', $blog->id)}}" @endif>
            @if($blog->id)
                @method('PUT')
            @endif 
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $blog->title) }}">
                        @if($errors->has('title'))
                            <div class="invalid">{{$errors->first('title')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control convert-to-slug" name="slug" id="slug" value="{{ old('slug', $blog->slug) }}">
                        @if($errors->has('slug'))
                            <div class="invalid">{{$errors->first('slug')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Tiêu đề phụ</label>
                        <textarea name="subtitle" id="subtitle" rows="2" class="form-control">{{ old('subtitle', $blog->subtitle) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea name="content" id="content" class="content">{{ old('content', $blog->content) }}</textarea>
                        <input type="hidden" id="ck_image" 
                            value="{{route('blog.image', ['_token'=>csrf_token(), 'blog_id'=>$blog->id ])}}">
                        @if($errors->has('content'))
                            <div class="invalid">{{$errors->first('content')}}</div>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-header">
                            Cấu hình bài viết 
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Danh mục</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $blog->category_id? 'selected': ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <div class="invalid">{{$errors->first('category_id')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="0" {{$blog->status==0? 'selected': ''}}>Disable</option>
                                    <option value="1" {{$blog->status==1? 'selected': ''}}>Active</option>
                                </select>
                                @if($errors->has('status'))
                                    <div class="invalid">{{$errors->first('status')}}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Thứ tự</label>
                                <input type="number" class="form-control" name="sort_order" id="sort_order" value="{{ old('sort_order', $blog->sort_order) }}">
                            </div>
                            <div>
                                <label for="view" class="form-label">Số lượt xem</label>
                                <input type="number" class="form-control" name="view" id="view" value="{{ old('view', $blog->view) }}">
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            Banner và hình bài viết
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="background" class="form-label">Ảnh nền</label>
                                <select name="background" id="post-bg" class="form-control">
                                    <option value="">Mặc định</option>
                                    @foreach($banners as $banner)
                                        <option 
                                            value="bg_{{$banner->id}}" {{$banner->id==$blog->background? 'selected': ''}}>{{$banner->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="list-post-bg">
                                @foreach($banners as $banner)
                                    <img src="{{asset('upload/images/' . $banner->name )}}"
                                    alt="" id="bg_{{$banner->id}}" class="post-bg {{$banner->id !== $blog->background? 'disabled': ''}}">
                                @endforeach
                            </div>
                            <hr>
                            <button type="button" class="btn btn-save" data-url="{{route('gallery.frame')}}"
                                id="loadImageFrame">Duyệt hình ảnh</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-save mb-4">Lưu</button>
        </form>
    </main>
@endsection
