@extends("layout.default")

@section("title", "Login")

@section("content")
    <div class="container">
        <div id="form">
            @if(session()->has("success"))
                <div class="alert alert-success">
                    {{ session()->get("success") }}
                </div>
            @endif
            @if(session()->has("error"))
                <div class="alert alert-danger">
                    {{ session()->get("error") }}
                </div>
            @endif
            <h1 id="heading">Login Form</h1>
            <form name="form" action="{{ route('login.post') }}" method="POST" onsubmit="return isValid();">
                @csrf
                <div class="mb-3">
                    <label for="user" class="form-label">Enter Username/Email:</label>
                    <input type="text" id="user" name="user" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password:</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>
                <button type="submit" id="btn" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <script>
        function isValid() {
            var user = document.forms["form"]["user"].value;
            if (user.trim() === "") {
                alert("Enter username or email!");
                return false;
            }
            return true;
        }
    </script>
@endsection
