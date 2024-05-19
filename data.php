
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student data</title>
    <link rel="stylesheet" href="data.css">
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ojttask1";
$error_name = $error_rollno = $error_mobno = $error_college = $error_faculty = $error_city=""; 
$conn = new mysqli($servername, $username, $password, $database);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollno =$_POST['rollno'];
    $name = $_POST['name'];
    $mobno = $_POST['mobno'];
    $college =$_POST['college'];
    $faculty =$_POST['faculty'];
    $city = $_POST['city'];
    if(empty($rollno)) {
        $error_rollno = "Roll no. is required";
    }
    if(empty($name)) {
        $error_name = "Name is required";
    }
    if(empty($mobno)) {
        $error_mobno = "Mobile is required";
    }
    if(empty($city)) {
        $error_city = "Select once";
    }
    if(empty($college)) {
        $error_college = "College name is required";
    }
    if(empty($faculty)) {
        $error_faculty = "Faculty name is required";
    }
    if (empty($error_rollno) && empty($error_name)  && empty($error_mobno) && empty($error_city) && empty($error_college) && empty($error_faculty)) {
        if (isset($_POST["INSERT"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
             {
                $sql = "INSERT INTO data (Roll_no, Name	, Mob_no,City,College,Faculty) VALUES ('$rollno', '$name', '$mobno','$city','$college','$faculty')";
                if ($conn->query($sql) === TRUE) 
                {
                    echo '<script type="text/javascript">';
                    echo ' alert("Data inserted successfully!!")';  //not showing an alert box.
                    echo '</script>';
                    header("Location: marks.php");
                    exit();
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("faild")';  
                    echo '</script>';
                }}
        } else if (isset($_POST["UPDATE"])) 
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
             {
                $sql = "INSERT INTO data (roll, name, mobile,city,collegeName,faculty) VALUES ('$rollno', '$name', '$mobno','$city','$college','$faculty')";
                if ($conn->query($sql) === TRUE) 
                {
                    echo '<script type="text/javascript">';
                    echo ' alert("Data updated successfully!!")';  //not showing an alert box.
                    echo '</script>';
                    header("Location: marks.php");
                    exit();
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("faild")';  
                    echo '</script>';
                } }
        }else if (isset($_POST["DELETE"])) 
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $roll_number_to_delete = $_POST['rollno']; 
                $sql = "DELETE FROM data WHERE roll= '$roll_number_to_delete'";
                if (mysqli_query($conn, $sql)) {
                    echo '<script type="text/javascript">';
                    echo ' alert("Record deleted successfully!!")';  
                    echo '</script>';
                    header("Location: marks.php");
                    exit();
                } else {
                    echo '<script type="text/javascript">';
                    echo ' alert("Error deleting record!!")';
                    echo '</script>';
                }}
        }else if (isset($_POST["NEXT"])) {
            echo '<script type="text/javascript">';
            echo ' alert("update data")'; 
            echo '</script>';
        }else
        {
            echo '<script type="text/javascript">';
            echo ' alert("update data")';  
            echo '</script>';
        }}}
$conn->close();
?>
</head>
<body>
    <div class="container">
        <a href="#"><img src="left-arror.png" alt=""></a>
        <form action="" class="form" method="POST">
            <h2>ENTER DATA</h2>
            <input type="text" name="rollno"placeholder="Enter roll number"class="box">
            <label style="color: red;margin-left:-150px;"><?php echo $error_rollno ?></label>

            <input type="text"name="name"placeholder="Enter name"class="box">
            <label style="color: red;margin-left:-150px;"><?php echo $error_name ?></label>

            <input type="text" name="mobno"placeholder="Enter mobile number"class="box" >
            <label style="color: red;margin-left:-150px;"><?php echo $error_mobno ?></label>

            <select name="city" id="cars" class="box">
              <option value="nashik">Select city</option>
              <option value="nashik">Nashik</option>
              <option value="pimpalgoan">Pimpalgoan</option>
              <option value="pune">Pune</option>
              <option value="rnwad">Ranwad</option>
            </select>
            <label style="color: red;margin-left:-110px;"><?php echo $error_city ?></label>
            <input type="text"name="college"placeholder="Enter collge name"class="box">
            <label style="color: red;margin-left:-110px;"><?php echo $error_college ?></label>
            <input type="text"name="faculty"placeholder="Enter faculty"class="box">
            <label style="color: red;margin-left:-110px;"><?php echo $error_faculty?></label>
            <input type="submit"value="INSERT" name="INSERT" id="button">
            <input type="submit"value="UPDATE" name="UPDATE" id="button">
            <input type="submit"value="DELETE" name="DELETE" id="button">
            <input type="submit"value="NEXT" name="NEXT" id="button">
            <input type="submit"value="SAVE" name="SAVE" id="button">
        </form>
        <div class="image">
            <img src="chris-lee-70l1tDAI6rM-unsplash 1.png" alt="image">
          </div>
    </div>
</body>
</html>