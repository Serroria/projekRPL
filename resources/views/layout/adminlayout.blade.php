<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/adminSidebar.css') 
    @vite('resources/js/adminSidebar.js')
</head>
<body>
      <!--side bar-->
    <div>
    @include('admin.sidebar')
    </div>

     
    <div class="content">
        {{-- @include('admin.admin')
        @include('admin.edit') --}}
        @yield('content')
    </div>
    
</body>
</html>