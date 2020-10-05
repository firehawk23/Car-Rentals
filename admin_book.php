<?php
ob_Start();
$conn = new mysqli("localhost","root","","dbms_project");
if($conn->connect_error)
die("not connected:".$conn->connect_error);

echo '
<a href="adminhomepage.php"><i class="fa fa-reply" style="font-size:25px;"></i></a>
<form method="POST">
<input type="text"  name="srchval" id="un" placeholder="Search by BookID" >
<input type="submit" value="End Ride" name="srch" style=display:none;> 
</form>';


    $sql = "SELECT * from booking";    
        
    $result=$conn->query($sql);
    $size=0;
    while($row=$result->fetch_assoc()){
        
        if($row['bid']!='1'){
            $size++;
        echo '
    
    <div  class="card card-5">
    <p>Booking id : '.$row["bid"].'</p>
     <p>Main Passenger : '.$row["username"].'</p>
    <p> car num : '.$row["carnum"].'</p> 
    <p> From Date(yyyy/mm/dd) : '.$row["fromd"].'</p>
    <p>To Date(yyyy/mm/dd) : '.$row["tod"].'</p>
    <p>Purpose : '.$row["purpose"].'</p> 
        
    <hr/>
    <form method="POST">
    <input type="text" value='.$row['bid'].' name="bid" style=display:none;>
    <input type="submit" value="End Ride" name="end" class="example_a"> 
    </form>
    </div>';
        }
    
}
if($size==0){
    echo "<script>alert(\"No Bookings\");location.replace(\"adminhomepage.php\");</script>";
}

if(isset($_POST['end'])){
    $bid=$_POST['bid'];
    
    echo "<script>result=confirm(\"Ending Ride for bookid: $bid. Are you sure?\");
    
    if(result==true)
    location.replace(\"endride.php?bid=$bid\");
    else
    location.replace(\"admin_book.php\");
    </script>";
    
}
if(isset($_POST['srch'])){
    $val=$_POST['srchval'];
    ob_end_clean();
    echo '
    <a href="adminhomepage.php"><i class="fa fa-reply" style="font-size:25px;"></i></a>
    <form method="POST">
<input type="text"  name="srchval" id="un"  placeholder="Search by BookID" >
<input type="submit" value="End Ride" name="srch" style="display:none;"> 
</form>';
    if($val!="all"){
    

$sql = "SELECT * from booking where bid='$val'";    
        
    }
    else{
        $sql = "SELECT * from booking "; 
    }
    $result=$conn->query($sql);
    $size=0;
    while($row=$result->fetch_assoc()){
        
        if($row['bid']!='1'){
            $size++;
        echo '
    
    <div  class="card card-5">
    <p>Booking id : '.$row["bid"].'</p>
     <p>Main Passenger : '.$row["username"].'</p>
    <p> car num : '.$row["carnum"].'</p> 
    <p> From Date(yyyy/mm/dd) : '.$row["fromd"].'</p>
    <p>To Date(yyyy/mm/dd) : '.$row["tod"].'</p>
    <p>Purpose : '.$row["purpose"].'</p> 
        
    <hr/>
    <form method="POST">
    <input type="text" value='.$row['bid'].' name="bid" style=display:none;>
    <input type="submit" value="End Ride" name="end" class="example_a"> 
    </form>
    </div>';
        }
    }

}

?>

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
    .card-5 {
    box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
  }

  body {
    background: #e2e1e0;
    text-align: center;
  }
  
  .card {
    background: rgba(206, 20, 20, 0.308);
    border-radius: 2px;
    display: inline-block;
    height: 38%;
    
    position: relative;
    width: 30%;
  }

  .example_a {
    color: #fff !important;
    text-transform: uppercase;
    text-decoration: none;
    background: #ed3330;
    
    border-radius: 5px;
    display: inline-block;
    border: none;
    transition: all 0.4s ease 0s;
    height:30px;
    width:20%;
    }
    .example_a:hover {
        background: #434343;
        letter-spacing: 1px;
        -webkit-box-shadow: 0px 5px 40px -10px rgba(207, 48, 48, 0.925);
        -moz-box-shadow: 0px 5px 40px -10px rgba(219, 72, 72, 0.918);
        box-shadow: 5px 40px -10px rgba(221, 74, 74, 0.89);
        transition: all 0.4s ease 0s;
        }
        #un {
    border: 5px solid white; 
    -webkit-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    -moz-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    padding: 15px;
    background: rgb(255, 255, 255);
    margin: 0 0 10px 0;
    width:30%;
    height:40px;
}
    </style>
</head>
</html>