<?php
ob_start();
$conn = new mysqli("localhost","root","","dbms_project");
if($conn->connect_error)
die("not connected:".$conn->connect_error);

$un=($_GET["un"]);
$carnum=$_GET['carnum'];
echo"<div class=\"bg-image\"></div>";





    $sql = "SELECT * from car where carnum='$carnum'";    
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    echo "<div class=\"bg-text\">";

echo '
<a href="custhome.php?un='.$un.'"><i class="fa fa-reply" style="font-size:25px;float:left;color:red;"></i></a>;
<div class="card card-5">
<p>car name : '.$row["carname"].'</p>  
    <p> car num : '.$row["carnum"].'</p> 
    <p> Distance Travelled:'.$row["dist"].'</p>
    <p>Rate per km : '.$row["dist"].'</p>
    <p>seating capacity:'.$row["scap"].'</p></div> ';
    
    echo '<form method="POST">';
    echo '<input placeholder="From Date"  type="text" onfocus="(this.type=\'date\')" name="from" id="un" required="required"><br/> ';
    echo '<input placeholder="To Date"  type="text" onfocus="(this.type=\'date\')" name="to" id="un" required="required" > <br/>';
    echo '<input type="text" name="purpose" placeholder="Purpose" id="un" required="required"><br/>';
    echo '<input type="submit" name="confirm" value="confirm" class="example_a">';
    echo '</form>';
   echo "</div>";



    if(isset($_POST['confirm'])){
        $from=$_POST['from'];
        $to=$_POST['to'];
        $pur=$_POST['purpose'];
        
        if($from!=""&&$to!=""&&$pur!=""){
        $sql = "INSERT into booking(username,carnum,fromd,tod,purpose) values ('$un','$carnum','$from','$to','$pur')";    
    $result=$conn->query($sql);
    echo "Booking Sucessful";
    $sql = "UPDATE car set isavailable='false' where carnum='$carnum'";    
    $result=$conn->query($sql);
    ob_end_clean();
    
    echo '<script>
    
    alert("Booking Confirmed");
    location.replace("custhome.php?un='.$un.'");
    
    </script>';

    }
        }
    

        



?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.example_a {
    color: #fff !important;
    text-transform: uppercase;
    text-decoration: none;
    background: #f80404;
    
    border-radius: 5px;
    display: inline-block;
    border: none;
    transition: all 0.4s ease 0s;
    height:30px;
    width:10%;
    }
    .example_a:hover {
        background: #434343;
        letter-spacing: 1px;
        -webkit-box-shadow: 0px 5px 40px -10px rgba(235, 46, 46, 0.925);
        -moz-box-shadow: 0px 5px 40px -10px rgba(248, 54, 54, 0.918);
        box-shadow: 5px 40px -10px rgba(248, 49, 49, 0.89);
        transition: all 0.4s ease 0s;
        }
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
    height: 40%;
    margin: 1rem;
    position: relative;
    width: 300px;
  }


  .bg-image {
    /* The image used */
    background-image: url("https://autoexpress.marfeel.com/statics/i/ps/cdn1.autoexpress.co.uk/sites/autoexpressuk/files/styles/3x2_960/public/2/22/dsc112-733_0.jpg?itok=ULvIVzR2");
    
    /* Add the blur effect */
    filter: blur(8px);
    -webkit-filter: blur(8px);
    
    /* Full height */
    height: 100%; 
    
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  
  /* Position text in the middle of the page/image */
  .bg-text {
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
    color: white;
    font-weight: bold;
    border: 3px solid #f1f1f1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 80%;
    padding: 20px;
    text-align: center;
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

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

        
</style>
</head>

</html>
