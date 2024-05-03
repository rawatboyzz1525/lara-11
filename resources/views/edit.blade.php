@extends('layout/master')
@section('title')
Eidt page
@endsection
@section('content')
<h2>{{$data->name}}(Edit)</h2>
<form action="{{route('form')}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="uid" id="uid" value="{{$data->id}}">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" value="{{$data->name}}">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" value="{{$data->email}}">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" value="{{$data->password}}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection