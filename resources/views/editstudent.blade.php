@extends('base')

@section('title')
<title>Edit Student</title>
@endsection

@section('content')
<div class="container mt-5">
    <div class="col-md-6 mx-auto p-5">
        <div class="card shadow p-3">
            <h4 class="text-center">Edit Student</h4>
            <form action="/update" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $student['id'] }}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $student['name'] }}"/>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="file" class="form-control" onchange="previewFile(this)" value="{{ asset('images/') }}/{{$student['profileimage']}}"/>
                    <img id="previewImg" alt="profile image" style="max-width: 130px; margin-top: 20px;" src="{{ asset('images/') }}/{{$student['profileimage']}}">
                </div>
                <button class="btn btn-info">Update Student</button>
            </form>
        </div>
    </div>
</div>
<script>
    function previewFile(input){
        var file=$("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection

