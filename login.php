<?php
session_start();
include 'header.php';

$conn = mysqli_connect("localhost", "root", "", "login");

if(mysqli_connect_error()){
	echo "faild to connect";
}

if (isset($_POST["submit"])){
	$uemail = $_POST["uemail"];
    $psw = $_POST["psw"];
    $resault = mysqli_query($conn, "SELECT * FROM accounts WHERE username = '$uemail' OR email = '$uemail' ");
    $row = mysqli_fetch_assoc($resault);
    if(mysqli_num_rows($resault) > 0 ){
        if($psw == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo "<script> alert('wrong password'); </script>";
        }
    }
    else{
        echo "<script> alert('user not found'); </script>";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

    div{
        width:350px;
        background:#eee;
        border-radius: 2px;
        box-sizing:border-box;
    }
    </style>
</head>
<body>
<div class="container-sm my-4 border">
    <h2 class="display-4 ">Registration</h2>
    <div class="container">    
        <button type= "button" class="btn btn-primary active" onclick="document.location='login.php'">Log in</button>
        <button type= "button" class="btn btn-primary" onclick="document.location='signup.php'">Sign up</button>
      <hr>
    </div>  
    <form action="login.php" method="post" class="mt-5">
        <div class="form-group">
            <label for="uemial">Email:</label>
            <input type="email" name="uemail" id="uemail" class="form-control mb-3" placeholder="enter email or username" required>
        </div>  
        <div class="form-group" >
            <label for="psw">password:</label>
            <input type="password" name="psw" id="psw" class="form-control mb-3" placeholder="enter password" required>
            </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button><br>
    </form>
    don't have account? <a href="signup.php">create accouont</a>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
     crossorigin="anonymous"></script>
</body>
</html>
