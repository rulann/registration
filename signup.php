<?php
session_start();
include 'header.php';

$conn = mysqli_connect("localhost", "root", "", "login");

if(mysqli_connect_error()){
	echo "faild to connect";
}

if (isset($_POST["submit"])){
    $uname = $_POST["uname"]; 
    $email = $_POST["email"]; 
    $psw = $_POST["psw"]; 
    $cpsw = $_POST["cpsw"]; 
    $used = mysqli_query($conn, "SELECT * FROM accounts WHERE username= '$uname' OR email = '$email' ");
    if (mysqli_num_rows($used) > 0){
        echo "<script> alert('username or email is already used'); </script>";
    }
    else{
        if($psw == $cpsw){
            $query = "INSERT INTO accounts VALUES ('', '$uname', '$psw', '$email')";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration successfully'); </script>";
            header("Location: index.php");
        }
        else{
            echo "<script> alert('Password doesn\'t match'); </script>";
        }
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    div{
        width:350px;
        background:#eee;
        border-radius: 2px;
        box-sizing:border-box;
        display: block;
        clear: both;
    }
       </style>
</head>
<body>
<div class="container-sm mt-4 border">
    <h2 class="display-4 ">Registration</h2>
    <div class="container">
        <button type= "button" class="btn btn-primary" onclick="document.location='login.php'">Log in</button>
        <button type= "button" class="btn btn-primary active" onclick="document.location='signup.php'">Sign up</button>
        <hr>
    </div>  
    <div class="d-flex align-items-center justify-content-center ">
    <form action="" method="post" >
    <div class="form-group">
            <label for="uname">user name:</label>
            <input type="text" name="uname" id="uname" class="form-control mb-3" placeholder="enter username:" required>
        </div>
        <div class="form-group">
            <label for="emial">Email:</label>
            <input type="email" name="email" id="email" class="form-control mb-3" placeholder="enter email:" required>
        </div>  
        <div class="form-group" >
            <label for="psw" >password:</label>
            <input type="password" name="psw" id="psw" class="form-control mb-3" placeholder="enter password" required>
            </div>
            <div class="form-group" >
            <label for="cpsw" >confirm password:</label>
            <input type="password" name="cpsw" id="cpsw" class="form-control mb-3" placeholder="confirm your password" required>
            </div>
       
        <button type="submit" name="submit" class="btn btn-primary" >register</button><br>
    </form>
    </div>
    already have account?<a href="login.php">Log in</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
     crossorigin="anonymous"></script>
</body>
</html>