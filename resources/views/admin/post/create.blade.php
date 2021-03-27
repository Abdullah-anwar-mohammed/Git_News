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
</head>
<body>

  @include('admin.layout.nav')

  <div class="container text-right pt-5">
   <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
       @csrf
    <div class="form-group">
      <h2>اضافة موضوع جديد</h2>
      <a href="{{route('post.index')}}" class="btn btn-info">المواضيع</a>
    </div>
    <div class="form-group">
        <input type="text" required class="form-control" name="title" placeholder="العنوان" />
        <input type="hidden"  class="form-control"  name="by_admin" value="{{auth()->guard('admin')->user()->name}}" />
      </div>

    <div class="form-group">
      <textarea placeholder="المحتوى" required  name="content" class="form-control" rows="15"></textarea>
    </div>

    <div class="form-group">
      <label>القسم :</label>
        <select name="category">
          @foreach ($Cat as $C)
              <option value="{{$C->id}}">{{$C->name}}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
      <input type="file" name="img" />
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-danger" name="add" value="اضافة" />
    </div>
   </form>
  </div>

</body>
</html>
