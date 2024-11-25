<form method="post" action="">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <label for="password">Password</label>
    <input type="text" name="password" id="password">
    <button type="submit">Login</button>
</form>




<?php 

session_start();

require('./koneksi.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "select * from user where username = '$username'";
    $result = mysqli_query($koneksi, $sql);
    if($result && mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        if(password_verify($password,$data['password'])){
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = $data['role'];
            $_SESSION['login'] = true;
            header('Location: index.php');
        } else{
            echo "<script>alert('Password Salah')</script>";

        }
        
    }else{
        echo '<script>alert("Username Salah")</script>';
    }


}

        
    

?>