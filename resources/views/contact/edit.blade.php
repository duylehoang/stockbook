@extends('layout_admin')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Contacts / Chỉnh sửa</h1>
        </div>
        <div class="row">
            <div class="col-8">
                <form method="POST" action="{{route('contact.update', $contact->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên liên hệ</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $contact->name) }}">
                        @if($errors->has('name'))
                            <div class="invalid">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $contact->email) }}">
                        @if($errors->has('email'))
                            <div class="invalid">{{$errors->first('email')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" rows="4" class="form-control">{{ old('message', $contact->message) }}</textarea>
                        @if($errors->has('message'))
                            <div class="invalid">{{$errors->first('message')}}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="replied" class="form-label">Replied</label>
                        <select class="form-control" name="replied" id="replied">
                            <option value="0" {{$contact->replied==0? 'selected': ''}}>Chưa</option>
                            <option value="1" {{$contact->replied==1? 'selected': ''}}>Đã trả lời</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-save">Lưu</button>
                </form>
            </div>
        </div>
    </main>
@endsection
