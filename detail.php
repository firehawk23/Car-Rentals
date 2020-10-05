<?php

$conn = new mysqli("localhost","root","","dbms_project");
if($conn->connect_error)
die("not connected:".$conn->connect_error);

$un=$_GET['un'];
$sql = "SELECT * from customer where username='$un'";    
echo '<a href="custhome.php?un='.$un.'"><i class="fa fa-reply" style="font-size:25px;"></i></a>';
        
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    
    $name=$row["name"];
    $age=$row["age"];
    echo "<div >
    <h2>$name </h2>
    <h3>$age </h3> 
    <hr/>
    </div>";

    $sql = "SELECT * from booking where username='$un'";    
        
    $result=$conn->query($sql);
    echo "<h3>Your Bookings</h3>";
    $size=0;
    while($row=$result->fetch_assoc()){
        $size++;
        echo '
    
    <div  class="card card-5">
    
    <p> Booking ID : '.$row["bid"].'</p> 
    <p> car num : '.$row["carnum"].'</p> 
    <p> From Date(yyyy/mm/dd) : '.$row["fromd"].'</p>
    <p>To Date(yyyy/mm/dd) : '.$row["tod"].'</p>
    <p>Purpose : '.$row["purpose"].'</p> 
    <hr/>
        <form method=POST>
            <input type=text value='.$row["bid"].' name="bookid" style=display:none;>
            <input type=submit name=cancel value="Cancel" class="example_a">
        </form>
    
    
    </div>';
    }
    if($size==0){
    echo '<img src="https://cdn1.iconfinder.com/data/icons/rafif-rounded-glyph-vol-4/512/vol.4_not-512.png" style="width:20%;height:auto;">';
    
    echo '<p style="font-size:30px;">Go To <a href="custhome.php?un='.$un.'">Homepage</a></p>';
    }

    if(isset($_POST['cancel'])){
        $id=$_POST['bookid'];

        echo "<script> var result=confirm(\"Are you sure to cancel ? bookid=$id\");
        if(result==true)
        location.replace(\"temp.php?bid=$id&un=$un\");
        else
        location.replace(\"detail.php?un=$un\");
        
        </script>";
        
    }
    
?>

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/details.css">
</head>
</html>