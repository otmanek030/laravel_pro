@extends("layout.default")

@section("title", "Login")

@section("content")
   <div class="wrapper">
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
            <h2 id="heading">Login Form</h2>
            <form name="form" action="{{ route('login.post') }}" method="POST" onsubmit="return isValid();">
                @csrf
                <div class="input-field">
                    <input type="text" id="user" name="user" required>
                    <label for="user" >Enter your email</label>
                </div>
                <div class="input-field">
                    <input type="password" id="pass" name="pass"  required>
                    <label for="pass">Enter your password</label>
                </div>
                <div class="forget">
                    <label for="remember">
                      <input type="checkbox" id="remember">
                      <p>Remember me</p>
                    </label>
                </div>
                <button type="submit" id="btn">Login</button>
            </form>
        </div>
    </div>



@endsection

{{-- <body>
  <div class="wrapper">
    <form action="#">
      <h2>Login</h2>
        <div class="input-field">
        <input type="text" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" required>
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="#">Register</a></p>
      </div>
    </form>
  </div>
 --}}
