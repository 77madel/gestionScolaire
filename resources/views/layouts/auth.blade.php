<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Login</title>

    <link rel="shortcut icon" href="{{asset ("img/favicon.png") }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset ("plugins/bootstrap/css/bootstrap.min.css") }}">

    <link rel="stylesheet" href="{{asset ("plugins/feather/feather.css") }}">

    <link rel="stylesheet" href="{{asset ("plugins/icons/flags/flags.css") }}">

    <link rel="stylesheet" href="{{asset ("plugins/fontawesome/css/fontawesome.min.css") }}">
    <link rel="stylesheet" href="{{asset ("plugins/fontawesome/css/all.min.css") }}">

    <link rel="stylesheet" href="{{asset ("css/style.css") }}">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{asset ("img/login.png") }}" alt="Logo">
                    </div>
                    <div class="login-right">
                        @yield("login")
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset ("js/jquery-3.6.0.min.js") }}"></script>

    <script src="{{asset ("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

    <script src="{{asset ("js/feather.min.js") }}"></script>

    <script src="{{asset ("js/script.js") }}"></script>
</body>

</html>
