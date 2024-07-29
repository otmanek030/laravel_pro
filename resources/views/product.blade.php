<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">


        <style>
            .main{
                left: 100px;
            }
            .form {
                margin-left: 50px;
            }

            .local {
                position: absolute;
                top: 10%;
                right: 60px;
                left: 400px;
            }


            .produit {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                padding: 10px;
                margin-top: 20px;
                /* Ajustez selon vos besoins */
                border-radius: 8px;
            }

            body {
                font-family: "Libre Baskerville", serif;
                font-weight: 550;
                font-style: normal;
                margin: 0;
                padding: 0;
            }

            .card {
                width: 13%;
                height: auto;
                /* Ajustez selon vos besoins */
                font-size: 20px;
                margin: 20px;
                border-radius: 7px;
                border: 1px solid #ccc;
                /* Ajoutez une bordure temporaire pour débogage */
            }

            .title {
                text-align: center;
                color: #2d4e2d;
                padding: 20px;
                margin: 0;
                font-size: 25px;
            }

            .up {
                text-align: center;
                /* Ajusté pour centrer le contenu */
            }

            .p_name {
                background: linear-gradient(45deg, #648064, #3c7a3c);
                display: flex;
                justify-content: center;
                align-items: center;
                height: 50px;
                border-top-right-radius: 8px;
                border-top-left-radius: 8px;
                color: white;
                /* Ajoutez une couleur de texte pour plus de visibilité */
            }

            .pic {
                background-size: cover;
                background-position: center;
                height: 30vh;
                border-bottom-right-radius: 8px;
                border-bottom-left-radius: 8px;
            }

            h1 {
                margin: 0;
            }

            form {
                margin-top: 20px;
            }

            input {
                display: block;
                margin-bottom: 10px;
            }

            button {
                display: block;
            }
        </style>

</head>

<body>
    <div>
        @php
            include public_path('assets/php/myphp.php');
        @endphp
    </div>
    <div class="local">
        <div class="up">
            <div class="title">
                <h1>Welcome to our shop</h1>
            </div>
            <hr>
        </div>

        <div class="main">
            <div class="produit">
                @foreach ($products as $product)
                    <div class="card">
                        <div class="p_name">
                            <h4>{{ $product->name }}</h4>
                        </div>
                        <div class="pic" style="background-image: url('{{ asset('public/products/') }}');">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="form">
                <form id="cardForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" id="paragraphText" placeholder="Enter product name" name="pro_name" required>
                    <input type="file" id="pictureUrl" accept="image/jpeg, image/png, image/jpg" name="image"
                        required>
                    {{-- <p>Image URL: {{ asset('storage/products/' . $product->photo) }}</p> --}}
                    <button type="submit">Add New Product</button>
                </form>
            </div>
        </div>
</body>

</html>
