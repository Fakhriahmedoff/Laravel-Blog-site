@extends('back.layouts.master')
@section('title', 'Meqale Yarat')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><strong>meqale tapildi</strong></h6>
    </div>
    <div class="card-body">
      @if($errors->any())
        @foreach ($errors->all() as $err)
            {{$err}}
        @endforeach

      @endif
        <form action="{{route('meqaleler.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
                <div class="form-group">
                        <label > Meqale Basligi</label>
                        <br>
                        <input style="width:100%;" type="text" name="title" class="from-control" required id="">
                    </div>
                    <div class="form-group">
                        <label > Categorya Basligi</label>
                        <select name="category" class="form-control" name="category" id="">
                            <option value="">Secim et</option>
                            @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                    </div>  
                    <div class="form-group">
                      <label > Meqale Sekil</label>
                      <input type="file" name="image" class="from-control" required id="">
                  </div>
                  <div class="form-group">
                    <label > Meqale Contenti</label>
                    <textarea id="editor" name="content" class="from-control" required rows="8"> </textarea>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block">Submit</button>
                </div>
        </form>
    </div>
  </div>


@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>    

<script>

$(document).ready(function() {
  $('#editor').summernote(
    {
      'height': 200
    }
  );
  
});

</script>
@endsection