@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Galleries / {{ $gallery->id? 'Chỉnh sửa': 'Thêm mới' }}</h1>
        </div>
        <div class="row">
            <div class="col-8">
                <form 
                    method="POST" 
                    enctype="multipart/form-data"
                    @if(!$gallery->id) action="{{route('gallery.store')}}" @else action="{{route('gallery.update', $gallery->id)}}" @endif
                >
                    @if($gallery->id)
                        @method('PUT')
                    @endif 
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Chọn hình ảnh</label>
                        <div class="upload-area">
                            <label for="image" class="label-upload">Upload</label>
                            <input type="file" name="image" id="image" onchange="readURL(this)" accept="image/*" hidden>
                            <img src="{{$gallery->name? asset('upload/images/'. $gallery->name): asset('images/no-image.png')}}" alt="" id="reviewImage">
                        </div>
                        @if($errors->has('image'))
                            <div class="invalid">{{$errors->first('image')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Loại hình ảnh</label>
                        <select class="form-control" name="type" id="type">
                            <option value="1" {{$gallery->type==1? 'selected': ''}}>{{ getGalleryType(1) }}</option>
                            <option value="2" {{$gallery->type==2? 'selected': ''}}>{{ getGalleryType(2) }}</option>
                            <option value="3" {{$gallery->type==3? 'selected': ''}}>{{ getGalleryType(3) }}</option>
                            <option value="4" {{$gallery->type==4? 'selected': ''}}>{{ getGalleryType(4) }}</option>
                            <option value="5" {{$gallery->type==5? 'selected': ''}}>{{ getGalleryType(5) }}</option>
                            <option value="6" {{$gallery->type==6? 'selected': ''}}>{{ getGalleryType(6) }}</option>
                        </select>
                        @if($errors->has('type'))
                            <div class="invalid">{{$errors->first('type')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-control" name="status" id="status">
                            <option value="0" {{$gallery->status==0? 'selected': ''}}>Disable</option>
                            <option value="1" {{$gallery->status==1? 'selected': ''}}>Active</option>
                        </select>
                        @if($errors->has('status'))
                            <div class="invalid">{{$errors->first('status')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Thứ tự</label>
                        <input type="number" class="form-control" name="sort_order" id="sort_order" value="{{ old('sort_order', $gallery->sort_order) }}">
                    </div>
                    <button type="submit" class="btn btn-save">Lưu</button>
                </form>
            </div>
        </div>
    </main>
@endsection
