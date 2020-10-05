<?php

$bid=$_GET['bid'];
$un=$_GET['un'];

$conn = new mysqli("localhost","root","","dbms_project");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

    $sql = "SELECT * from booking where bid='$bid'";    
        
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();

    $carnum=$row['carnum'];
    $sql = "UPDATE car set isavailable='true' where carnum='$carnum'";    
        
    $result=$conn->query($sql);



    $sql = "DELETE from booking where bid='$bid'";    
        
    $result=$conn->query($sql);
    if($result==false)
    echo "$conn->error";
    header("Location:detail.php?un=$un");

?>

