<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <?php
        session_start();
        $servername = "localhost";
        $uname = "root";
        $password = "";
        $database = "ojttask1";
        $pattern = '/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/';

        $conn = new mysqli($servername, $uname, $password, $database);
        $error_username = $error_password = ""; 
       
        if ($_SERVER["REQUEST_METHOD"] == "POST")  {
           
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
            if(empty($_POST['password'])) {
                $error_password = "Password is required";
            }
            if(empty($error_username) && empty($error_password)) {
                if (isset($_POST["login"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                     $sql = "SELECT * FROM registration WHERE username = '$username'";
                     $result = mysqli_query($conn, $sql);
                     $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                     if ($user) 
                      {
                         if ($password === $user["password"]) {
                           $_SESSION['username'] = $username;
                           echo "<script> alert('Login Successfully!!');</script>";
                           header('Location: data.php');
                           exit();
                         }
                         else {
                            echo '<script type="text/javascript">';
                            echo ' alert("Password does not match!!")';  //not showing an alert box.
                            echo '</script>';
                         } }
                     else{
                            echo '<script type="text/javascript">';
                            echo ' alert("Username does not match!!")';  //not showing an alert box.
                            echo '</script>';
                     }  } } }
?>  
</head>
<body>
   <div class="container">
    <form action="" class="form" method="POST">
      <h2>LOGIN</h2>
      <input type="text" name="username" class="box" placeholder="Enter username">
      <label style="color: red;margin-left:-100px;"><?php echo $error_username ?></label>
      <input type="password" name="password" class="box" placeholder="Enter password">
      <label style="color: red;margin-left:-100px;"><?php echo $error_password ?></label>
      <input type="submit" value="LOGIN" id="button" name="login" >
      <div><p >Not registered yet <a href="reg.php">Register Here</a></p></div>
    </form>
    <div class="image">
      <img src="chris-lee-70l1tDAI6rM-unsplash 1.png" alt="">
    </div></div>  
</body>
</html>