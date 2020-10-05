<?php
echo "
<head> 
<link type=\"text/css\" rel=\"stylesheet\" href=\"css/login.css\">
<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.8.2/css/all.css\" integrity=\"sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay\" crossorigin=\"anonymous\">
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
<title>Stay Connected</title>
</head>";

session_start();
ob_start();


if (isset($_POST['submit'])){
    $conn = new mysqli("localhost","root","","dbms_project");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

    $un = mysqli_real_escape_string($conn, $_REQUEST['un']);
    $_SESSION['un']=$un;
    $pswrd = mysqli_real_escape_string($conn, $_REQUEST['pw']);

    if($un=="admin"){
        if($pswrd=="admin"){
            header("Location:adminhomepage.php");
        }
        echo "<script type='text/javascript'>alert('wrong credentials for admin');</script>";
        }
    else{
    $sql = "SELECT password from customer where username='$un'";    
    
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$actual=$row["password"];

if($actual===null)
echo "<script type='text/javascript'>alert('invalid username');</script>";

else{
if($pswrd===$actual){
    
    header("Location:custhome.php?un=$un");

echo "logged in";

//echo "<script type='text/javascript'>location.replace(\"userhome.php\");</script>";

}
else
echo "<script type='text/javascript'>alert('wrong password');</script>";
}
}
}
ob_flush();
?>



<html>
    
    
<body>

<div class="bg-image"></div>

<div class="bg-text">
<img src="https://static.thenounproject.com/png/506621-200.png" style="margin-bottom:3%;width:25%;height:auto;">
<form action="" method="POST" class="form">
                     
                     <input type="text" placeholder="Username" name="un" id="un" class="effect-9"><br>            
                     <input type="password" placeholder="Password" name="pw" id="un" class="effect-9">   <br>
                     <input type="submit" name="submit" id="submit" value="Submit" class="example_a">              
             </form>
  
</div>

    
   <body>

</html>


