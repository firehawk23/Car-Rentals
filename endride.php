<?php
$bid=$_GET['bid'];
$conn = new mysqli("localhost","root","","dbms_project");
if($conn->connect_error)
die("not connected:".$conn->connect_error);
?>

<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    p{
        text-align:center;
        margin-top:1%;

    }
    </style>
</head>


<body style="background-color:grey;">
<a href="adminhomepage.php"><i class="fa fa-reply" style="font-size:25px;"></i></a>
    <?php
    $sql = "SELECT * from booking where bid=$bid";    
        
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $carnum=$row['carnum'];
    $un=$row['username'];

    $sql = "UPDATE car set isavailable='true' where carnum='$carnum'";            
    $result=$conn->query($sql);
    
    $sql = "SELECT * from customer where username='$un' ";    
        
    $result=$conn->query($sql);
    $row1=$result->fetch_assoc();

    $sql = "SELECT rate from car where carnum='$carnum' ";    
        
    $result=$conn->query($sql);
    $row2=$result->fetch_assoc();


    $datetime1 = strtotime($row['fromd']);
    date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d', time());
$datetime2 = strtotime($date);

$secs = $datetime2 - $datetime1;// == <seconds between the two times>
$days = $secs / 86400;
$amount=($days+1)*$row2['rate'];


$sql = "INSERT into bill(total_amount,book_id,return_date) values('$amount','$bid','$date') ";    
        
    $result=$conn->query($sql);
    if($result==false)
    echo $conn->error;

$sql = "DELETE from booking where bid='$bid' ";    
        
    $result=$conn->query($sql);
    
    ?>
<div style="width:50%;height:90%;margin-left:25%;margin-right:25%;margin-top:3%;background-color:white;">
<p style="font-size:35px;margin-top:1%;">Invoice</p>
    <p style="font-size:35px;color:green;">driveRent</p>
    <p style="font-size:25px;" >Book ID : <?php echo $bid?></p>
    <hr/>

    <div>
        <p style="font-size:25px">Details</p>
        <p style="font-size:20px;">Name : <?php echo $row1['name']?></p>
        <p style="font-size:20px;">Age : <?php echo $row1['age']?></p>
        <p style="font-size:20px;">Email : <?php echo $row1['email']?></p>
    </div>
<hr/>
    <div>
        <p style="font-size:25px;">Trip Details</p>
    <p style="font-size:20px;">Car Number : <?php echo $row['carnum']?></p>
        <p style="font-size:20px;">Started on : <?php echo $row['fromd']?></p>
        <p style="font-size:20px;">Ended on : <?php echo $row['tod']?></p>
        <p style="font-size:20px;">Purpose : <?php echo $row['purpose']?></p>
   </div>
   <div>
       <p style="font-size:35px;color:red;">Total Fare: Rs <?php echo $amount?>/-</p>

</div>

    <div>

    <p></p>
</div>
    </div>
</body>
<script>
    print();
    </script>
</html>