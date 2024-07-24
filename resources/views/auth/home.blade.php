@extends('layout.home')
@section('title', 'home')
@section('content')

<head>
    <title>Example</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body>
    <div>
        @php
            include public_path('assets/php/myphp.php');
        @endphp
    </div>

    <style>
        body{
            position: relative;
            height: 100vh;
            left: 60px; /* Adjust this value to move more to the left */
            width: calc(100% - 260px);
            background-image: url('{{ asset('assets/image/img.png') }}'); /* Background image */
            background-size: cover; /* Ensure the image covers the entire background */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Prevent the image from repeating */

          }
    </style>

</body>



@endsection
