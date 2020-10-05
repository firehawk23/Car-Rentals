<?php
echo"<head> <title>Stay Connected</title></head>";
$conn = new mysqli("localhost","root","","dbms_project");
if($conn->connect_error)
die("not connected:".$conn->connect_error);

if (isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_REQUEST['nm']);
    $age = mysqli_real_escape_string($conn, $_REQUEST['age']);
    $mail = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $un = mysqli_real_escape_string($conn, $_REQUEST['un']);
    $pswrd = mysqli_real_escape_string($conn, $_REQUEST['pw']);

$sql = "INSERT into customer values('$name','$age','$mail','$un','$pswrd')";

    if ($conn->query($sql) === FALSE) 
         {
        echo "Error updating record: " . $conn->error;
    }
    else{
        echo "<script>alert(\"Account Created\");location.replace(\"homepage.html\");</script>";

    }
}


?>



<html>
    <head>
    <link type="text/css" rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
     
</head>
    
    
<body>
<div class="bg-image"></div>

<div class="bg-text">
    <form action="" method="POST" class="form">
        <img src="https://cdn2.iconfinder.com/data/icons/shopping-67/24/Security-512.png" style="width:20%;height:auto;margin-bottom:5%;">
       <div>          
       <i class="fa fa-user-circle-o icon"></i>    
       <input type="text" placeholder="Name" name="nm" id="un" required="required" ><br>
       </div>       
        
       <div>
       <i class="fa fa-calendar icon"></i>
       <input type="number" placeholder="Age" min="18" name="age" id="un" required="required"><br>
       </div>
            <div>
            <i class="fa fa-envelope icon"></i>
            <input type="email" placeholder="email" name="email" id="un" required="required" ><br>
            </div>
            <div>
            <i class="fas fa-desktop icon"></i>
            <input type="text" placeholder="Username" name="un" id="un" required="required"><br>
            </div>
            
            <div>
            <i class="fa fa-qrcode icon qricon"></i>
            <input type="password" placeholder="Password" name="pw" pattern=".{6,}" id="un" required="required">  <br>
            </div>
            
            <input type="submit" name="submit" id="submit" value="Submit" class="example_a">              
    </form>
</div>
</body>
</html>