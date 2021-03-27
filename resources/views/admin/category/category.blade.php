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
    <h2>الاقسام</h2>
    <a href="{{route('category.create')}}" class=" mb-2 btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i>       اضافة قسم جديد</a>
    <table class="table table-dark">
        <thead>
          <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>بواسطة</th>
            <th>تاريخ الانشاء</th>
            <th>تفاعل</th>
          </tr>
        </thead>
        <tbody>
         
          @foreach ($Categories as $Category)
              <tr>
                <td>1</td>
                <td>{{$Category->name}}</td>
                <td>{{$Category->by_admin}}</td>
                <td>{{$Category->created_at}}</td>
                <td>

                  <form method="POST" action="{{route('category.destroy',$Category->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    <a href="{{route('category.show',$Category->id)}}" class="btn btn-success">تعديل</a></td>
                  </form>

              </tr>
          @endforeach
        </tbody>
      </table>
  </div>
</body>
</html>
