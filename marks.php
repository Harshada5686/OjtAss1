<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter marks </title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .center {
            margin: 0 auto;
            align:'center'
        }
    </style>
    <link rel="stylesheet" href="marks.css">
    <?php
    session_start();

        $error_name = $error_rollno =$error_physics = $error_chemistry = $error_mathematics =$error_geography =$error_marathi =$error_english=""; // Initialize error variables
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {               
                if (isset($_POST["SAVE"])) 
                {
                    $roll =$_POST['rollno'];
                    $name = $_POST['name'];
                    $physics = $_POST['physics'];
                    $chemistry = $_POST['chemistry'];
                    $mathematics = $_POST['mathematics'];
                    $geograph = $_POST['geography'];
                    $marathi = $_POST['marathi'];
                    $english = $_POST['english'];
                    if(empty($roll)) {

                        $error_rollno = "Roll no. is required";
                    }                             
                    if(empty($name)) {
                        $error_name = "Name is required";
                    }         
                    if(empty($physics)) {
                        $error_physics = "physics marks is required";
                    }                  
                    if(empty($chemistry)) {
                        $error_chemistry = "chemistry marks is required";
                    }                  
                    if(empty($mathematics)) {
                        $error_mathematics = "mathematics marks is required";
                    }
                    if(empty($geograph)) {
                        $error_geography = "geograph marks is required";
                    }
                    if(empty($marathi)) {
                        $error_marathi = "marathi marks is required";
                    }                   
                    if(empty($english)) {
                        $error_english = "english marks is required";
                    }} }
    ?>
</head>
<body>
    <div class="container"> 
        <form action="" class="form" method="POST">
        <h2>Enter Marks</h2>
            <input type="text" name="rollno"placeholder="Enter roll number"class="box" value=<?php echo htmlspecialchars($_SESSION['rollno']); ?>>
            <label style="color: red;margin-left:-110px;"><?php echo $error_rollno ?></label>
            <input type="text"name="name"placeholder="Enter name"class="box">
            <label style="color: red;margin-left:-120px;"><?php echo $error_name ?></label>
            <input type="text" name="physics" placeholder="PHYSICS" class="box">
            <label style="color: red;margin-left:-70px;"><?php echo $error_physics ?></label>
            <input type="text" name="chemistry" placeholder="CHEMISTRY" class="box">
            <label style="color: red;margin-left:-60px;"><?php echo $error_chemistry ?></label>
            <input type="text"name="mathematics" placeholder="MATHEMATICS" class="box">
            <label style="color: red;margin-left:-40px;"><?php echo $error_mathematics ?></label>
            <input type="text" name="geography" placeholder="GEOGRAPHY" class="box">
            <label style="color: red;margin-left:-50px;"><?php echo $error_geography ?></label>
            <input type="text" name="marathi" placeholder="MARATHI" class="box">
            <label style="color: red;margin-left:-60px;"><?php echo $error_marathi ?></label>
            <input type="text" name="english" placeholder="ENGLISH" class="box">
            <label style="color: red;margin-left:-60px;"><?php echo $error_english ?></label>
            <input type="submit" value="Show Result" name="SAVE" id="button">
        </form>
        <div class="image">
            <img src="chris-lee-70l1tDAI6rM-unsplash 1.png" alt="">
          </div>
    </div>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "ojttask1";
        $conn = new mysqli($servername, $username, $password, $database);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["SAVE"]))  {
                    $roll =$_POST['rollno'];
                    $name = $_POST['name'];
                    $physics = $_POST['physics'];
                    $chemistry = $_POST['chemistry'];
                    $mathematics = $_POST['mathematics'];
                    $geograph = $_POST['geography'];
                    $marathi = $_POST['marathi'];
                    $english = $_POST['english'];
                    if (empty($error_physics) && empty($error_chemistry)  && empty($error_mathematics) && empty($error_geograph) && empty($error_marathi)  && empty($error_english) ){
                        if ($_SERVER["REQUEST_METHOD"] == "POST")
                        {
                            $sql = "INSERT INTO marks (Physics,Chemistry,Mathematics,Geography,Marathi,English) VALUES ('$physics','$chemistry','$mathematics','$geograph','$marathi','$english')";
                            if ($conn->query($sql) === TRUE) {
                                echo '<script type="text/javascript">';
                                echo ' alert("marks inserted successfully!!!")';  //not showing an alert box.
                                echo '</script>';
                                $total_marks = $physics + $chemistry + $mathematics + $geograph + $marathi + $english;
                                $percentage = ($total_marks / 600) * 100;

                                if($percentage>35)
                                {
                                    $status = "pass";
                                }
                                else
                                {
                                    $status = "Fail";
                                }
                                echo "<div style='width:800px; margin:0 auto;margin-bottom:100px;margin-top:30px';>";
                                echo "<h2>Student Result</h2>";
                                echo "<table>";
                                echo "<tr><th>Student Details</th><th>Value</th></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Roll Number</td><td style='color: black;font-weight: bold;'>$roll</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Student Name</td><td style='color: black;font-weight: bold;'>$name</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Physics </td><td>$physics</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Chemistry </td><td>$chemistry</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>mathematics </td><td>$mathematics</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Geograph </td><td>$geograph</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Marathi </td><td>$marathi</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>English </td><td>$english</td></tr>";
                                echo "<tr><td <td style='color: black;font-weight: bold;'>Total Marks</td><td>$total_marks</td></tr>";
                                echo "<tr><td <td style='color: black;font-weight: bold;'>Percentage</td><td>$percentage%</td></tr>";
                                echo "<tr><td <td style='color: black;font-weight: bold;'>Status</td><td style='color: red;font-weight: bold;'>$status</td></tr>";
                                echo "</table>";
                                echo "</div>";
                            } else {
                                echo '<script type="text/javascript">';
                                echo ' alert("faild")';  
                                echo '</script>';
                            }
                        } } } }
        $conn->close();
?>
</body>
</html>
