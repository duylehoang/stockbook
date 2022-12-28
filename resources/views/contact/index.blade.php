@extends('layout_admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Contacts</h1>
    </div>
    <form class="search-box" method="GET" action="{{route('contact.index') }}">
        <input type="hidden" name="search_box" value="1">
        <select name="replied">
            <option value="">-- Replied --</option>
            <option value="'0'">Chưa</option>
            <option value="1">Đã trả lời</option>
        </select>
        <input type="text" name="search" placeholder="search..." value="{{$request->search}}">
        <button type="submit">Search</button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-sm table-main" id="table-contacts">
            <thead>
                <tr>
                    <th scope="col" class="col-order">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Replied</th>
                    <th scope="col">Created At</th>
                    <th scope="col" class="action">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($contacts)==0) 
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr>
                @else 
                @foreach ($contacts as $key=>$item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->message }}</td>
                        <td>{{ $item->replied==1? 'Đã trả lời': 'Chưa' }}</td>
                        <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                        <td class="action">
                            <a href="{{ route('contact.edit', $item->id) }}">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="{{ route('contact.delete', $item->id) }}" class="confirm-delete">
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