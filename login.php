<?php
//database connection code starts--
$liserver = "localhost";
$liusername = "root";
$lipassword = "";
$lidb = "users123";
$lconn = mysqli_connect($liserver, $liusername, $lipassword, $lidb);

//if ($conn){
//  echo "success";
//}
//if (!$conn){
//  die("error");
//}

//database connection code ends--

if (isset($_POST['lsubmit'])){
    if (isset($_POST['lusername'])){
        $lusername = $_POST['lusername'];
    }
    if (isset($_POST['lpassword'])){
        $lpassword = $_POST['lpassword'];
    }
    
    $lsql = "Select * from users where username='$lusername' AND password='$lpassword'";
    $result = mysqli_query($lconn, $lsql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        echo "You are logged in";
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $lusername;
        header("location: welcome.php");
    }
    else {
        echo "Invalid Credentials";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>Login</h2>
        <form action="login.php" method="POST">
            Username: <input type="text" name = "lpassword"><br>
            Password: <input type="password" name = "lusername"><br>
            <button type="submit" name="lsubmit">Submit</button>
        </form>
    </div>
</body>
</html>