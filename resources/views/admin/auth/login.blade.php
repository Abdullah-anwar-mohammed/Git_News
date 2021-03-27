<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .flex{
            height:100vh;
            display: flex;
            align-items: center;
            width:100%;
            justify-content: center;
        }
        .flex form{
            width:50%;
        }
    </style>
</head>
<body>
    <div class="container">
        @if($errors->any)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach 
        @endif
        <div class="flex text-center">
        <form method="POST" action="{{route('admin.dologin')}}">
            @csrf
            <div class="form-group">
                <h2>Control Panel Admin</h2>
     
            </div>
            <div class="form-group">
                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email" />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info btn-lg" value="Login" />
            </div>
        </form>
        </div>
    </div>
</body>
</html>
