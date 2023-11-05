@extends('index')
@section('register')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif 

<form method="POST" action="{{ route('doregister') }}" class="bg-dark text-light mt-5 p-3">
    @csrf
    <label for="">Enter Name</label>
    <input type="text" name="name" class="form-control">
    <label for="">Enter Email</label>
    <input type="email" name="email" class="form-control">
    <label for="">Enter DOB</label>
    <input type="date" name="dob" class="form-control">
    <label for="">Enter Place</label>
    <input type="text" name="place" class="form-control"><br>
    <input type="submit" class="btn btn-primary">
</form>
@endsection