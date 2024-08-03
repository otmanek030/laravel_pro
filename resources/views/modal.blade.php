<style>
    /* Modal background */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999; /* Ensure it is on top of other elements */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden; /* Prevent scrolling */
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Modal content box */
    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); /* Center the modal */
        background-color: #fefefe;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        box-sizing: border-box; /* Include padding and border in element's total width and height */
    }

    /* Close button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
    }

    /* Form styles */
    .form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form input,
    .form textarea,
    .form button {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 16px;
    }

    .form input:focus,
    .form textarea:focus {
        border-color: #2d4e2d;
        outline: none;
    }

    .form button {
        background-color: #2d4e2d;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form button:hover {
        background-color: #648064;
    }

    .modal-title {
        text-align: center;
        margin-bottom: 20px;
        color: #2d4e2d;
        font-size: 24px;
    }
</style>

<div id="ModalCreate" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h5 class="modal-title">New Product</h5>
        <form id="cardForm" action="{{ route('contact.store') }}" method="POST">
            @csrf
            <input type="text" id="fullName" placeholder="Enter full name" name="full_name" required>
            <input type="email" id="email" placeholder="Enter email" name="email" required>
            <input type="tel" id="tel" placeholder="phone number" name="tel" required>
            <textarea id="comment" placeholder="Enter paragraph text" name="comment" required></textarea>
            <button type="submit">submit</button>
        </form>
    </div>
</div>

<script>
    // Function to open the modal
    function openModal() {
        document.getElementById('ModalCreate').style.display = 'block';
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('ModalCreate').style.display = 'none';
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target == document.getElementById('ModalCreate')) {
            closeModal();
        }
    }
</script>
