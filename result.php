<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Result</title>
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

<?php
    session_start();

$r_no = $_SESSION['Rollno'];
$full_name = $_SESSION['Name'];

$p=$_SESSION['Physics'];
$c=$_SESSION['Chemistry'];
$math=$_SESSION['Mathematics'];
$g=$_SESSION['Geograph'];
$m=$_SESSION['Marathi'];
$e=$_SESSION['English'];
$per=$_SESSION['Percentage'];
$tot=$_SESSION['Total'];
$sts=$_SESSION['Status'];


                                echo "<div style='width:800px; margin:0 auto;margin-bottom:100px;margin-top:30px';>";
                                echo "<h2>Student Result</h2>";
                                echo "<table>";
                                echo "<tr><th>Student Details</th><th>Value</th></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Roll Number</td><td style='color: black;font-weight: bold;'>$r_no</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Student Name</td><td style='color: black;font-weight: bold;'>$full_name</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Physics </td><td>$p</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Chemistry </td><td>$c</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>mathematics </td><td>$math</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Geograph </td><td>$g</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>Marathi </td><td>$m</td></tr>";
                                echo "<tr><td style='color: black;font-weight: bold;'>English </td><td>$e</td></tr>";
                                echo "<tr><td <td style='color: black;font-weight: bold;'>Total Marks</td><td>$tot</td></tr>";
                                echo "<tr><td <td style='color: black;font-weight: bold;'>Percentage</td><td>$per%</td></tr>";
                                echo "<tr><td <td style='color: black;font-weight: bold;'>Status</td><td style='color: red;font-weight: bold;'>$sts</td></tr>";
                                echo "</table>";
                                echo "</div>";
                           
        
?>
</head>
<body>
    
</body>
</html>