<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    @vite('resources/css/adminSidebar.css') 
    @vite('resources/js/adminSidebar.js')
</head>
<body>
      <!--side bar-->
    <div>
    @include('admin.sidebar')
    </div>

     
    <div class="main-content">
        @include('admin.admin')
        @include('admin.edit')
        @yield('content')
    </div>
    
</body>
</html>