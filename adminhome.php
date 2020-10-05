<?php
$conn = new mysqli("localhost","root","","dbms_project");
if($conn->connect_error)
die("not connected:".$conn->connect_error);

if (isset($_POST['submit'])){
    $carname = mysqli_real_escape_string($conn, $_REQUEST['carname']);
    $carnum = mysqli_real_escape_string($conn, $_REQUEST['carnum']);
    $dist = mysqli_real_escape_string($conn, $_REQUEST['dist']);
    $rate = mysqli_real_escape_string($conn, $_REQUEST['rate']);
    $scap = mysqli_real_escape_string($conn, $_REQUEST['scap']);
    $city=mysqli_real_escape_string($conn, $_REQUEST['city']);

    /*$sql = "INSERT into car values('$carname','$carnum','$dist','$rate','$scap','true',$city)";

    if ($conn->query($sql) === FALSE) 
         {
        echo "Error updating record: " . $conn->error;
    }
echo "created";
}*/
if($city!="sel"){
    $sql="SELECT cityid from city where cityname=\"$city\"";

$result=$conn->query($sql);
$row=$result->fetch_assoc();
$cid=$row["cityid"];

$sql = "INSERT into car values('$carname','$carnum','$dist','$rate','$scap','true',$cid)";

    if ($conn->query($sql) === FALSE) 
         {
        echo "Error updating record: " . $conn->error;
    }
echo "<script> alert(\"Added Successfully\");location.replace(\"adminhomepage.php\")</script>";
}
}

?>

<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.bg-image {
    /* The image used */
    background-image: url("https://images.unsplash.com/photo-1516478679236-b2f42e7062f7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80");
    
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
    height:30px;
    margin-left:1%;
}
#un1{
    width:30%;
    height:30px;
    margin-left:1%;
    margin-bottom:2%;
}

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
    </style>
    </head>
   
<div class="bg-image"></div>

<div class="bg-text">
<?php echo '<a href="adminhomepage.php"><i class="fa fa-reply" style="font-size:25px;float:left;color:red;"></i></a><br/>';?>
<form action="" method="POST" class="form">
       <div>          
       <i class="fa fa-user-circle-o icon"></i>    
       <input type="text" placeholder="Car Name" name="carname" id="un" required="required" ><br>
       </div>       
        
       <div>
       <i class="fa fa-calendar icon"></i>
       <input type="text" placeholder="Car Number" name="carnum" id="un" required="required" pattern="[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{4}"><br>
       </div>
            <div>
            <i class="fa fa-envelope icon"></i>
            <input type="number" placeholder="Distance Travelled" min="0" name="dist" id="un" required="required" ><br>
            </div>
            <div>
            <i class="fas fa-desktop icon"></i>
            <input type="number" placeholder="Rate Per Day" min="500" name="rate" id="un" required="required"><br>
            </div>
            
            <div>
            <i class="fa fa-qrcode icon qricon"></i>
            <input type="number" min="2" max="9" placeholder="Seating Capacity" name="scap" id="un" required="required">  <br>
            </div>

            
            <div>
            <i class="fa fa-qrcode icon qricon"></i>
            <select  name="city" id="un1"> 

            <?php

$city=array(
    'Ariyalur',
    'Chennai',
    'Coimbatore',
    'Cuddalore',
    'Dharmapuri',
    'Dindigul',
    'Erode',
    'Kanchipuram',
    'Kanyakumari',
    'Karur',
    'Madurai',
    'Nagapattinam',
    'Nilgiris',
    'Namakkal',
    'Perambalur',
    'Pudukkottai',
    'Ramanathapuram',
    'Salem',
    'Sivaganga',
    'Tirupur',
    'Tiruchirappalli',
    'Theni',
    'Tirunelveli',
    'Thanjavur',
    'Thoothukudi',
    'Tiruvallur',
    'Tiruvarur',
    'Tiruvannamalai',
    'Vellore',
    'Viluppuram',
    'Virudhunagar',
);
$i=1;
$sz=sizeof($city);

echo "<option value=\"sel\">Select City</option>";
foreach ($city as $chak){
echo "<option value=$chak>$chak</option>";
}
            ?>
</select>
                
            

            <br>
            </div>
            
            <input type="submit" name="submit" class="example_a" value="Submit">              
    </form>
</div>
</html>