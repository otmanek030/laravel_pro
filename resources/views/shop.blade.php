<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">

    <style>
    body {
        font-family: "Libre Baskerville", serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
        color: #333;
        background-image: url('{{ asset('assets/image/main2.png') }}');
        background-size:cover;
        /* Ensure the image covers the entire background */
        background-position: center;
        /* Center the background image */
        background-repeat: no-repeat;
        /* Prevent the image from repeating */
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
                <div class="card" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" data-photo="{{ asset('storage/products/' . $product->photo) }}">
                    <div class="card-img-top" style="background-image: url('{{ asset('storage/products/' . $product->photo) }}');"></div>
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>
                            <h3>{{ $product->price }} MAD</h3>
                        </p>
                        <div class="counter-container">
                            <button class="counter-btn minus" data-id="{{ $product->id }}">-</button>
                            <span class="counter" data-id="{{ $product->id }}">0</span>
                            <button class="counter-btn plus" data-id="{{ $product->id }}">+</button>
                        </div>
                        <div class="butt">
                            <button class="btn-primary select-product" role="button"><span class="select">Select</span></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <button class="close-sidebar" onclick="toggleSidebar()">×</button>
            <h2>Selected Products</h2>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody id="selected-products-body">
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th id="total-price">$0.00</th>
                    </tr>
                </tfoot>
            </table>
            <div class="butt">
            <button class="btn-primary select-product" onclick="valider()"><span class="select">valider</span></button>
            </div>

        </div>

        <!-- Toggle Sidebar Button -->
        <button class="toggle-sidebar" onclick="toggleSidebar()">
            <i class="bi bi-plus-square-fill"></i>
        </button>
        <!-- Modal -->
        @include('modal')
    </div>

    <script>
        let selectedProducts = [];
        const sidebarBody = document.getElementById('selected-products-body');
        const totalPriceElement = document.getElementById('total-price');

        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("show");
        }

        document.querySelectorAll('.select-product').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.card');
                const productId = card.getAttribute('data-id');
                const productName = card.getAttribute('data-name');
                const productPrice = parseFloat(card.getAttribute('data-price'));
                const productPhoto = card.getAttribute('data-photo');
                const quantity = parseInt(card.querySelector(`.counter[data-id="${productId}"]`).textContent);

                if (!selectedProducts.find(p => p.id === productId)) {
                    selectedProducts.push({ id: productId, name: productName, price: productPrice, photo: productPhoto, quantity });
                } else {
                    selectedProducts = selectedProducts.map(p => {
                        if (p.id === productId) {
                            return { ...p, quantity };
                        }
                        return p;
                    });
                }
                updateSidebar();
            });
        });

        document.querySelectorAll('.counter-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                const counter = document.querySelector(`.counter[data-id="${productId}"]`);
                let currentCount = parseInt(counter.textContent);

                if (this.classList.contains('plus')) {
                    counter.textContent = currentCount + 1;
                } else if (this.classList.contains('minus') && currentCount > 0) {
                    counter.textContent = currentCount - 1;
                }
            });
        });

        function updateSidebar() {
            sidebarBody.innerHTML = '';
            let totalPrice = 0;

            selectedProducts.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><img src="${product.photo}" alt="${product.name}"></td>
                    <td>${product.name}</td>
                    <td>${product.quantity}</td>
                    <td>${(product.price * product.quantity).toFixed(2)} MAD</td>
                `;
                sidebarBody.appendChild(row);
                totalPrice += product.price * product.quantity;
            });

            totalPriceElement.textContent = `${totalPrice.toFixed(2)} MAD`;
        }





    </script>

</body>

</html>
