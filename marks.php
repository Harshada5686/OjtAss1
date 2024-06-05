<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter marks </title>
    <link rel="stylesheet" href="marks.css">
    <?php
    session_start();
    $r_no = $_SESSION['Rollno'];
$full_name = $_SESSION['Name'];

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
                    $is_valid=true;
                    if(empty($roll)) {

                        $error_rollno = "Roll no. is required";
                    $is_valid=false;

                    }                             
                    if(empty($name)) {
                        $error_name = "Name is required";
                    $is_valid=false;

                    }         
                    if(empty($physics)) {
                        $error_physics = "physics marks is required";
                    $is_valid=false;

                    }                  
                    if(empty($chemistry)) {
                        $error_chemistry = "chemistry marks is required";
                    $is_valid=false;

                    }                  
                    if(empty($mathematics)) {
                        $error_mathematics = "mathematics marks is required";
                    $is_valid=false;

                    }
                    if(empty($geograph)) {
                        $error_geography = "geograph marks is required";
                    $is_valid=false;

                    }
                    if(empty($marathi)) {
                        $error_marathi = "marathi marks is required";
                    $is_valid=false;

                    }                   
                    if(empty($english)) {
                        $error_english = "english marks is required";
                    $is_valid=false;

                    }
                    if ($is_valid)
                    {$total_marks = $physics + $chemistry + $mathematics + $geograph + $marathi + $english;
                        $percentage = ($total_marks / 600) * 100;

                        if($percentage>35)
                        {
                            $status = "pass";
                        }
                        else
                        {
                            $status = "Fail";
                        }
                        $_SESSION['Physics']=$physics;
                        $_SESSION['Chemistry']=$chemistry;
                        $_SESSION['Mathematics']=$mathematics;
                        $_SESSION['Geograph']=$geograph;
                        $_SESSION['Marathi']=$marathi;
                        $_SESSION['English']=$english;
                        $_SESSION['Percentage']=$percentage;
                        $_SESSION['Total']=$total_marks;
                        $_SESSION['Status']=$status;


                        header("Location: result.php");

                    }
                } }
    ?>
</head>
<body>
    <div class="container"> 
        <form action="" class="form" method="POST">
        <h2>Enter Marks</h2>
            <input type="text" name="rollno"placeholder="Enter roll number"class="box" value=<?php echo $r_no ?>>
            <label style="color: red;margin-left:-110px;"><?php echo $error_rollno ?></label>
            <input type="text"name="name"placeholder="Enter name"class="box" value=<?php echo $full_name ?>>
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
    
</body>
</html>
