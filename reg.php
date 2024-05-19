<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="reg.css">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ojttask1";
$pattern = '/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/';

$error_name = $error_username = $error_password =""; // Initialize error variables
$conn = new mysqli($servername, $username, $password, $database);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $uname = $_POST['username'];
    $password = $_POST['password'];
    if(empty($_POST['name'])) 
    {
        $error_name = "Name is required";
    }
    else if (preg_match($pattern, $_POST['name'])){
        $error_name = "";
    }
    else{
        $error_name = "Please enter valid name";
    }
    if(empty($_POST['username'])) 
            {
                $error_username = "Username is required";
            }
            else if (preg_match($pattern, $_POST['username'])){
                $error_username = "";
            }
            else{
                $error_username = "Please enter valid username";
            }
    if(empty($password)) {
        $error_password = "Password is required";
    }
    if (empty($error_name) && empty($error_username)  && empty($error_password) ) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "INSERT INTO registration (name, username, password) VALUES ('$name', '$uname', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('Registration successfully!!');window.location.href='login.php';</script>";
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("faild")';  
            echo '</script>';
        } } } }
$conn->close();
?>
</head>
<body>
    <div class="container">   
        <form action="" class="form" method="POST">
            <h2>REGISTRATION</h2>
            <input type="text" name="name" placeholder="Enter name "class="box">
            <label style="color: red;margin-left:-130px;"><?php echo $error_name ?></label>
            <input type="text" name="username"placeholder="Enter username" class="box">
            <label style="color: red;margin-left:-110px;"><?php echo $error_username ?></label>
            <input type="password" name="password" placeholder="Enter password " class="box">
            <label style="color: red;margin-left:-110px;"><?php echo $error_password ?></label>
            <input type="submit" value="REGISTER"id="button">
        </form>
        <div class="image">
      <img src="chris-lee-70l1tDAI6rM-unsplash 1.png" alt="">
        </div>
    </div>
</body>
</html>