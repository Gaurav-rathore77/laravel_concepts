<!DOCTYPE html>
<html>
<head>
  <title>Blog CMS</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <header>
    <a href="/">Home</a>

    <form action="{{ route('search') }}" method="GET" style="display:inline;">
    <input type="text" name="q" placeholder="Search posts...">
    <button type="submit">Search</button>
</form>

  </header>
  <div class="container">
     @yield('content')
  </div>
</body>
</html>
