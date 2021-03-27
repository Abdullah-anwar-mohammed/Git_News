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
    <h2>جميع المنشورات</h2>
    <a href="{{route('post.create')}}" class="btn btn-light my-2">انشاء منشور جديد</a>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>الاسم</th>
          <th>الصورة</th>
          <th>القسم</th>
          <th>بواسطة</th>
          <th>التاريخ</th>
          <th>أكشن</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Posts as $Post)
        <tr>
          <td>1</td>
          <td>{{$Post->title}}</td>
          <td><img src="{{asset('storage/uploads/posts/'.$Post->img)}}" width="100" /></td>
          <td>{{$Post->cat->name}}</td>
          <td>{{$Post->by_admin}}</td>
          <td>{{$Post->created_at}}</td>
          <td>
            <form action="{{route('post.destroy',$Post->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button input="submit" class="btn btn-danger">حذف</button>
              <a href="{{route('post.edit',$Post->id)}}" class="btn btn-info">Update</a>

            </form>
          </td>

        </tr>
        @endforeach
   
        
      </tbody>
    </table>
  </div>

</body>
</html>
