<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/font-awesome.min.css" />
  <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/main.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    a:hover{
      text-decoration: none
    }
  </style>
</head>
<body>

  @include('admin.layout.nav')

  <div class="container text-right pt-5">
    <h2>تعديل قسم <span class="text-danger">{{$data['name']}}</span></h2>
    <form action="{{route('category.update',$data['id'])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" required name="name" value="{{$data['name']}}" class="form-control" />
            <input type="hidden" required  name="by_admin" value="{{Auth::guard('admin')->user()->name}}" class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" value="تعديل" class="btn btn-success" />
        </div>
    </form>
  </div>
</body>
</html>
