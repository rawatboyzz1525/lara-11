@extends('layout/master')
@section('title')
    List page
@endsection
    @section('content')
    <div class="tbl">
        <form action="{{route('form')}}" method="post">
            @csrf
            <input type="hidden" name="uid" id="uid">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="fname" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="femail" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="fpassword" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                
                @foreach ($data as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td id="name{{$item->id}}">{{$item->name}}</td>
                    <td id="email{{$item->id}}">{{$item->email}}</td>
                    <td id="pass{{$item->id}}">{{$item->password}}</td>
                    <td><a onclick="update({{$item->id}})" class="btn btn-primary">Edit</a><a href="{{route('form',$item->id)}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>

        
    @endsection
@push('scripts')
    <script>
          function update(id){
            var name=$('#name'+id).text();
            var email=$('#email'+id).text();
            var pass=$('#pass'+id).text();
            $('#fname').val(name);
            $('#femail').val(email);
            $('#fpassword').val(pass);
            $('#uid').val(id);
            }
  
    </script>
@endpush