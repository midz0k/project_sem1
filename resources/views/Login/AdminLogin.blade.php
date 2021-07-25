@extends ('Login.master') 
@section('LoginAdmin') 
@if(Session::get('success'))
    <div class="alert alert-info ml-lg-auto" id="hide" style="width: 300px; margin-right: 350px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{Session::get('success')}}!</strong>
    </div>
@endif
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form method="POST" action="{{route('checkLogin')}}">
            @csrf
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input type="email" class="form-control" id="" placeholder="Email" name="email">
            <input type="password" class="form-control" id="" placeholder="Password" name="password">
            <a href="#">Forgot your password?</a>
            <button name="submit" type="submit">Submit</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp" disabled >Sign Up</button>
            </div>
        </div>
    </div>
</div>
@stop