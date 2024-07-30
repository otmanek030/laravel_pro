<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Libre Baskerville", serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
            /* position: absolute; */
        }

        .title {
            text-align: center;
            color: #2d4e2d;
            margin-bottom: 40px;
        }

        .produit {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            width: 280px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .p_name {
            background: linear-gradient(45deg, #648064, #3c7a3c);
            color: white;
            padding: 10px;
            text-align: center;
        }

        .pic {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .form {
            margin-top: 40px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form input,
        .form button {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form button {
            background-color: #2d4e2d;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form button:hover {
            background-color: #648064;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="title">
            <h1>Welcome to our shop</h1>
            <hr>
        </div>
        <div class="produit">
            @foreach ($products as $product)
                <div class="card">
                    <div class="p_name">
                        <h4>{{ $product->name }}</h4>
                    </div>
                    <div class="pic" style="background-image: url('{{ asset('storage/products/' . $product->photo) }}');"></div>
                </div>
            @endforeach
        </div>
        <div class="form">
            <form id="cardForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" id="paragraphText" placeholder="Enter product name" name="pro_name" required>
                <input type="file" id="pictureUrl" accept="image/jpeg, image/png, image/jpg" name="image" required>
                <button type="submit">Add New Product</button>
            </form>
        </div>
    </div>
    @php
        include public_path('assets/php/myphp.php');
    @endphp
</body>

</html>
