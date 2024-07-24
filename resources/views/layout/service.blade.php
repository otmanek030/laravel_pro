<!-- resources/views/example.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Example</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
    <div>
        @php
            include(public_path('assets/php/myphp.php'));
        @endphp
    </div>


  

</body>
</html>
