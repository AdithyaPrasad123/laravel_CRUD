@extends('index')
@section('register')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif 
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
<button type="button" class="close" data-dismiss="alert">×</button>	
<strong>{{ $message }}</strong>
</div>
@endif

<table class=" table table-dark table-hover mt-5">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>DOB</th>
        <th>Place</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @foreach($data as $datas)
    <tr>
        <td>{{ $datas->name }}</td>
        <td>{{ $datas->email }}</td>
        <td>{{ $datas->dob }}</td>
        <td>{{ $datas->place }}</td>
        <td><a href="{{ route('edit',$datas->id) }}" class="btn btn-info">Edit</a></td>
        <td><a href="{{ route('delete',$datas->id) }}" class="btn btn-danger">Delete</a></td>
       
    </tr>
    @endforeach
</table>
@endsection