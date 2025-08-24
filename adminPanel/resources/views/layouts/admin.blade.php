<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Blog CMS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { font-family: Arial; background:#f5f5f5; margin:0; }
        nav { background:#333; padding:10px; color:#fff; }
        nav a { color:#fff; margin-right:15px; text-decoration:none; }
        .container { padding:20px; }
        table { width:100%; background:#fff; border-collapse: collapse; }
        table th, table td { border:1px solid #ddd; padding:8px; }
        .btn { padding:5px 10px; text-decoration:none; border:1px solid #000; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('posts.index') }}">Posts</a>
        <a href="{{ route('categories.index') }}">Categories</a>
        <a href="{{ route('tags.index') }}">Tags</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">@csrf</form>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
