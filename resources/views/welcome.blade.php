<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            .welcome-bg{
                background: url('{{asset('assets/site/images/welcome.png')}}');
                background-size: cover;
                background-repeat: no-repeat;
            }
    /* Container needed to position the button. Adjust the width as needed */
    .container {
    position: relative;
    width: 100%;
    }

    /* Make the image responsive */
    .container img {
    width: 100%;
    height: auto;
    }
            /* Style the button and place it in the middle of the container/image */
            .container .btn {
            position: absolute;
            top: 50%;
            left: 90%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            background-color: #004F7A;
            color: white;
            font-size: 16px;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top:20px;
            text-decoration: none
            }

            .container .btn:hover {
            background-color: black;
            }
        </style>
    </head>
    <body class="welcome-bg">
        <div class="container">
            {{-- <img src="{{asset('assets/site/images/welcome.png')}}" alt="Snow"> --}}
            <a href="{{route('login')}}" class="btn">Login</button>
        </div>
    </body>
</html>
