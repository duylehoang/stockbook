<div class="row">
    @foreach($images as $image)
    <div class="col-2 mb-2">
        <img src="{{ asset('upload/images/'. $image->name)}}" alt="" class="img-card">
    </div>
    @endforeach
</div>