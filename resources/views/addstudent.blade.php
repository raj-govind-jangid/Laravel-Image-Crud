@extends('base')

@section('title')
<title>Add Student</title>
@endsection

@section('content')
<div class="container mt-5">
    <div class="col-md-6 mx-auto p-5">
        <div class="card shadow p-3">
            <h4 class="text-center">Add Student</h4>
            <form action="/storestudent" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="file" class="form-control" onchange="previewFile(this)"/>
                    <img id="previewImg" alt="profile image" style="max-width: 130px; margin-top: 20px;">
                </div>
                <button class="btn btn-info">Add Student</button>
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

