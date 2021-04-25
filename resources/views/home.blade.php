@extends('base')

@section('title')
<title>Home</title>
@endsection

@section('content')
<div class="container mt-5">
    <div class="col-md-12 mx-auto">
        <div class="card shadow p-4">
            <h1 class="text-center mb-4">Student Lists</h1>
                <table class="table table-striped table-border text-center">
                    <thead>
                      <tr>
                        <th>Profile Name</th>
                        <th>Full Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($student as $student)
                      <tr>
                        <td><img style="width: 70px; height: 50px;" src="{{ asset('images/') }}/{{$student['profileimage']}}"/></td>
                        <td>{{ $student['name'] }}</td>
                        <td>
                            <a href="/edit/{{ $student['id'] }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="/delete/{{ $student['id'] }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
        </div>
    </div>
</div>
@endsection

