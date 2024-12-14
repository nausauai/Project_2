<?php 
//login
require "../koneksi.php";
require "../session.php";
if(isset($_POST['login'])){
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);
  
  $result = mysqli_query($koneksi, "select * from user where username = '$username'");
  if(mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    if(password_verify($password, $data['password'])){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $data['email'];
        $_SESSION['user_role'] = $data['role'];
        header('location: ../index.php');
    }

  }else{
    echo "<script>alert('username salah')</script>";
  }
}
//register
if(isset($_POST['register'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $pasword_hash = password_hash($password, PASSWORD_BCRYPT);
  $email = $_POST['email'];
  $result = mysqli_query($koneksi, "insert into user(username,password,email,role) values('$username','$password','$email','Operator')");
  if($result){
    echo "<script>alert('berhasil')</script>";
  }else {
    echo "<script>alert('gagal')</script>";
  }
}



?>  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Double Slider Login / Registration Form </title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container" id="container">

    <div class="form-container register-container">
      <form action="" method="post">
        <h1>Register hire.</h1>
        <input type="text" placeholder="Name" name="username">
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" name="register">Register</button>
        <span>or use your account</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
          <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
        </div>
      </form>
    </div>

    <div class="form-container login-container">
      <form action="" method="post">
        <h1>Login hire.</h1>
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox">
            <label>Remember me</label>
          </div>
          <div class="pass-link">
            <a href="#">Forgot password?</a>
          </div>
        </div>
        <button type="submit" name="login" >Login</button>
        <span>or use your account</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
          <a href="#" class="social"><i class="lni lni-linkedin-original"></i></a>
        </div>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Hello <br> friends</h1>
          <p>if Yout have an account, login here and have fun</p>
          <button class="ghost" id="login">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Start yout <br> journy now</h1>
          <p>if you don't have an account yet, join us and start your journey.</p>
          <button class="ghost" id="register" >Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <script src="script.js"></script>

</body>
</html>