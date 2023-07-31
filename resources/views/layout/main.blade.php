
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document Assignment</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css')}}">
    @yield('style')
</head>
<body>

    @yield('content')

    @yield('script')
    <script src=""></script>
</body>
</html>