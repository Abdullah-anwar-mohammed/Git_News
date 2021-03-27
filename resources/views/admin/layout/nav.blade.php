<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">لوحة التحكم</a>
  
    <!-- Links -->
    <ul class="navbar-nav">
    
      <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">الاقسام</a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{route('post.index')}}">المواضيع</a>
      </li>
  
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          الاعدادت
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{route('front.home')}}">الموقع</a>
          <a class="dropdown-item" href="{{route('admin.logout')}}">تسجيل الخروج</a>
        </div>
      </li>
    </ul>
  </nav>