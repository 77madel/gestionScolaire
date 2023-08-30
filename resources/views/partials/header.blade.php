<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>
        @yield("title")
    </title>
    <link rel="shortcut icon" href="{{asset ("img/favicon.png") }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{asset ("plugins/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{asset ("plugins/feather/feather.css") }}">
    <link rel="stylesheet" href="{{asset ("plugins/icons/flags/flags.css") }}">
    <link rel="stylesheet" href="{{asset ("plugins/fontawesome/css/fontawesome.min.css") }}">
    <link rel="stylesheet" href="{{asset ("plugins/fontawesome/css/all.min.css") }}">
    <link rel="stylesheet" href="{{asset ("css/style.css") }}">
    @livewireStyles
</head>

<body>

    <div class="main-wrapper">

        <div class="header">
