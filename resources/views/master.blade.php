<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My todo-list</title>

    <style type="text/css">
        /* .gradient-custom {
            background: radial-gradient(50% 123.47% at 50% 50%, #00ff94 0%, #720059 100%),
                linear-gradient(121.28deg, #669600 0%, #ff0000 100%),
                linear-gradient(360deg, #0029ff 0%, #8fff00 100%),
                radial-gradient(100% 164.72% at 100% 100%, #6100ff 0%, #00ff57 100%),
                radial-gradient(100% 148.07% at 0% 0%, #fff500 0%, #51d500 100%);
            background-blend-mode: screen, color-dodge, overlay, difference, normal;
            
            }
        .container{
            background-color:white;
            padding-top:20px;
        } */
        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.6;
        }
        .strike
            {
                text-decoration: line-through;
            }

        td,tr,th{
            border:1px solid white;
            border-collapse: collapse;
            cursor:all-scroll;
            }
        table{
            border-collapse: collapse;
            -webkit-user-select: none; /* Safari */
            -ms-user-select: none; /* IE 10+ and Edge */
            user-select: none; /* Standard syntax */
            }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




</head>
<body class="gradient-custom">
    @include('partials.navbar')
    <div class="container">
        @yield('content')
    </div>  
</body>
</html>