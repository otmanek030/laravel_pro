<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <div>
        @php
            include public_path('assets/php/myphp.php');
        @endphp
    </div>
    <div class="up">
        <div class="title">
            <h1>Welcome to our shop</h1>
        </div>
        <hr>
    </div>
    <div class="produit"></div>
    <div class="form">
        <form id="cardForm" action="{{ url('/product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" id="paragraphText" placeholder="Enter paragraph text" name="pro_name" required>
            <input type="file" id="pictureUrl" accept="image/jpeg, image/png, image/jpg" name="image" required>
            <button type="submit">Add New Card</button>
        </form>

        <form id="deleteForm" onsubmit="return deleteCard()">
            <button type="reset">Delete</button>
        </form>
    </div>
    <style>
        .form {
            margin-left: 50px;
        }

        .produit {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 10px;
            margin-top: -40%;
            border-radius: 8px;
        }

        body {
            position: relative;
            height: 70vh;
            margin-left: 60px;
            font-family: "Libre Baskerville", serif;
            font-weight: 550;
            font-style: normal;
        }

        .card {
            width: 13%;
            height: 30%;
            font-size: 20px;
            position: relative;
            margin: 20px;
            border-radius: 7px;
        }

        .title {
            text-align: center;
            color: #2d4e2d;
            padding: 20px;
            margin: 0;
            font-size: 25px;
        }

        .up {
            position: absolute;
            top: 5%;
            left: 500px;
        }

        .p_name {
            background: linear-gradient(45deg, #648064, #3c7a3c);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            border-top-right-radius: 8px;
            border-top-left-radius: 8px;
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
    <script>
        function addCard(event) {
            event.preventDefault();

            const paragraphText = document.getElementById('paragraphText').value;
            const pictureInput = document.getElementById('pictureUrl');
            const pictureFile = pictureInput.files[0];

            if (pictureFile) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    const newCard = document.createElement('div');
                    newCard.classList.add('card');

                    const pName = document.createElement('div');
                    pName.classList.add('p_name');
                    const pNameText = document.createElement('h4');
                    pNameText.textContent = paragraphText;
                    pName.appendChild(pNameText);

                    const pic = document.createElement('div');
                    pic.classList.add('pic');
                    pic.style.backgroundImage = `url('${event.target.result}')`;
                    pic.style.backgroundSize = 'cover';
                    pic.style.backgroundPosition = 'center';
                    pic.style.height = '30vh';

                    newCard.appendChild(pName);
                    newCard.appendChild(pic);

                    document.querySelector('.produit').appendChild(newCard);

                    document.getElementById('cardForm').reset();
                };

                reader.readAsDataURL(pictureFile);
            }
        }

        function deleteCard() {
            const produitDiv = document.querySelector('.produit');
            if (produitDiv.lastChild) {
                produitDiv.removeChild(produitDiv.lastChild);
            }
            return false;
        }

        document.getElementById('cardForm').addEventListener('submit', addCard);
    </script>
</body>

</html>
