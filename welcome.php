<?php 
session_start();
if (!isset($_SESSION['loggedin'])){
    header("location: login.php");
    exit;
}
if ($_SESSION['loggedin']!= true){
    header("location: login.php");
    exit;
}
echo "welcome ". $_SESSION['username'];

?>
<a href="logout.php"><h3>logout</h3></a>