<!DOCTYPE html>
<html>

<head>
    <title> @yield('title') </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ url('login_assets/style.css') }}" type='text/css'>
    <link rel="icon" href="{{url('assets/ruang.png')}}" type="image/png" />
</head>

<body>

    @yield('content')

    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax-utils.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
