<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('frontend/assets')}}/css/main.css" />
</head>
<body>
    <!-- Start Banner -->
    <div class="banner">
        <div class="flex container text-center">
            <div class="box">
                <h2>مميز</h2>
                <p>
                    لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه
                </p>
                @if(!Auth::check())
                <a href="{{route('login')}}" class="btn btn-info">دخول <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                <a href="{{route('register')}}" class="btn btn-info">تسجيل عضوية <i class="fa fa-database" aria-hidden="true"></i></a>
                @else
                <h4>مرحبا : {{Auth::user()->name}} <a href="{{route('user.logout')}}" class="btn btn-light">خروج</a></h4>
                @endif
                <form action="{{route('post.search')}}" method="GET">
                    <input type="search" name="search" class="form-control search" placeholder="بحث عن موضوع" />
                </form>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <div class="content">
          <div class="flex">
            <div class="right text-center">

              <ul>
               <h2>الاقسام</h2>
               <li><a href="{{route('front.home')}}"><i class="fa fa-list" aria-hidden="true"></i> العام </a></li>
                @foreach($categories as $cateogry)
                <li><a href="{{route('front.cat',$cateogry->name)}}"><i class="fa fa-list" aria-hidden="true"></i> {{$cateogry->name}}</a></li>
                @endforeach
              </ul>
            </div>
            <div class="left">
              <div class="posts">
                @foreach($posts as $post)
                <div class="post">
                  <h2>{{$post->title}}</h2>
                  <span><i class="fa fa-clock-o" aria-hidden="true"></i> 24 مارس 2021</span>
                  <div class="flex">
                    <img src="{{asset('storage\uploads\posts\\'.$post->img)}}" />
                    <div>
                      <p>
                      {!! substr($post->content,0,100) . "...." !!}
                      </p>
                      <a>بواسطة: {{$post->by_admin}}</a>
                      <br />
                      <button class="btn btn-info">الموضوع</button>
                    </div>
                  </div>
                </div>
               @endforeach

              </div>
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">{!! $posts->render() !!}</li>

                </ul>
              </nav>
            </div>
        
      </div>
      
    </div>

    <script src="{{asset('frontend/assets')}}/js/jquery.min.js"></script> 
    <script src="{{asset('frontend/assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend/assets')}}/js/main.js"></script>
</body>
</html>