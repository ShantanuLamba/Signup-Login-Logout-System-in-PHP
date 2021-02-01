
<?php
//database connection code starts--
$iserver = "localhost";
$iusername = "root";
$ipassword = "";
$idb = "users123";
$conn = mysqli_connect($iserver, $iusername, $ipassword, $idb);

//if ($conn){
//  echo "success";
//}
//if (!$conn){
//  die("error");
//}

//database connection code ends--
//database entry code starts--
$username = '';
$password = '';
$cpassword = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
}
if (isset($_POST['submit'])){
  if ($password == $cpassword) {
     $sql = "INSERT INTO users(username, password, dt) VALUES('$username', '$password', current_timestamp())";
  }
  $res = mysqli_query($conn, $sql);
  if($res){
    ?>
    <script>
      alert("Your account is now created!  Login to continue");
    </script>
    <?php
  }
  if(!$res){
    ?>
    <script>
      alert("Form Not Submitted Successfully, Please retry");
    </script>
    <?php
  }
}
//database entry code ends--
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
        <form action="aise_hi.php" method="POST">
          <h2>Signup</h2>
            Username : <input type="text" name="username"><br>
            Password : <input type="password" name="password"><br>
            Confirm Password : <input type="password" name="cpassword"><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>


