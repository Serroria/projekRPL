<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/adminSidebar.css') 
</head>
<body>
      <!--side bar-->
    <div>
    @include('admin.sidebar')
    </div>

     
    <div class="main-content">
        @yield('content')
    </div>
    
</body>
</html>