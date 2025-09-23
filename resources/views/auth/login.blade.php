@extends('layout.main')

@section('title')
    <title>Login</title>
@endsection

@section('body')
<h2>Login</h2>
  <form action="/login" method="POST" class="login-container">
    @csrf
    <label for="email">email:</label><br>
    <input type="text" id="email" name="email" placeholder="Please enter your e-mail address"><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" placeholder="Please enter the password"><br><br>
    <div class="create_new" style="text-align: center;">
    <a href="/../collab-training/register.php">Create New Account</a></div>
    <br><br>
    <button type="submit">Login</button>
    <p>Don't have an account? Create a new one.</p>
    <a id="new_user" href="{{route('register')}}">Create a new account</a>
    
  </form>
  @endsection