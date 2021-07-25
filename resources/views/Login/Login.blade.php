@extends ('Login.master') 
@section('Login') 
@if(Session::get('success'))
    <div class="alert alert-info ml-lg-auto" id="hide" style="width: 300px; margin-right: 350px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>{{Session::get('success')}}!</strong>
    </div>
@endif
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form method="POST" action="{{route('Createlogin')}}" enctype="multipart/form-data">
            @csrf
            <h3>Create <br> Account</h3>
            <input type="text" class="form-control" id="" placeholder="Name" name="name" value="{{old('name')}}">
            @error('name')
                    <small class="form-text" style="color: red">{{$message}}</small>
            @enderror
            <input type="text" class="form-control" id="" placeholder="Phone" name="phone" value="{{old('phone')}}">
            @error('phone')
                    <small class="form-text" style="color: red">{{$message}}</small>
            @enderror
            <input type="email" class="form-control" id="" placeholder="Email" name="email" value="{{old('email')}}">
            @error('email')
                    <small class="form-text" style="color: red">{{$message}}</small>
            @enderror
            <input type="password" class="form-control" id="" placeholder="Password" name="password">
            @error('Password')
                    <small class="form-text" style="color: red">{{$message}}</small>
            @enderror
            <input type="password" class="form-control" id="" placeholder="Password x2">
            <input type="file" class="file" id="exampleFormControlFile1" value="{{old('file')}}" name="file">
            @error('file')
                    <small class="form-text" style="color: red">{{$message}}</small>
            @enderror
            <button name="submit" style="margin-top: 10px;" type="submit">Submit</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form method="POST" action="{{route('Logins')}}">
            @csrf
            <h1>Sign in</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input type="hidden" name="Page" value="{{$Page}}">
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
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>
@stop