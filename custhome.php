<?php

ob_start();

$sql_act = "SELECT * from car where isavailable='true'";
$conn = new mysqli("localhost","root","","dbms_project");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

$un=($_GET["un"]);

$seatcap=-1;
$_SESSION['city']='';

/*functions*/


function print_cars($conn,$sql,$un){
    echo "<div style=margin-left:3%;>";
echo "<h2>Available Cars</h2>";
echo '<a href="login.php"><i class="fa fa-reply" style="font-size:25px;"></i></a>';
    
    
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){

    echo '
    <form action="" method="POST" class="form" style="display:inline-block;">
    <div class="card card-5"> 
    
    <p>car name : '.$row["carname"].'</p>  
    <p> car num : '.$row["carnum"].'</p> 
    <p> Distance Travelled:'.$row["dist"].'</p>
    <p>Rate per km : '.$row["dist"].'</p>
    <p>seating capacity:'.$row["scap"].'</p> 
    <form action="" method="POST">
    <input type=text value='.$row["carnum"].' name=nm style="display:none;">
    <hr/>
    <input type=submit value=book name=book class="example_a">
    </form>
    
    
    </div>
    </form>
    ';
}
echo "</div>";
}
/*----------*/

echo '<form method="POST" style="margin-bottom:4%;">
<input type="submit" value="View Profile" name="details" style="margin-bottom:4%;" id="rem">
<hr/>
</form>';


echo '
<div style="display:inline-block;width:30%;vertical-align:top;">
<form method="POST">
    <input type="submit" name="filtercity" value="filter by city" style=postion:relative; id="rem">
    </form>
    </div>';
echo "<div style=\"display:inline-block;width:60%;border-left:1px solid black;\">";
print_cars($conn,$sql_act,$un);
echo "</div>";





/*isset*/

if(isset($_POST['details'])){
    header("location:detail.php?un=$un");
}

if(isset($_POST['filtercity'])){
    
    ob_end_clean();
    ob_start();
    
    $sql = "SELECT distinct cid from car ";    
    
$result=$conn->query($sql);
echo '<form method="POST" style="margin-bottom:4%;">
<input type="submit" value="View Profile" name="details" style="margin-bottom:4%;" id="rem">
<hr/>
</form>';

echo '
<div style=display:inline-block;width:30%;vertical-align:top;>
<form method="POST">
    <input type="submit" name="filtercity" value="filter by city" style=postion:relative; id="rem">
    </form>';
      

echo "<div style=\"background-color:white;\">";
echo"<form method=POST>
<input type=text value=all name=val style=display:none;position:absolute;top:0>
<input type=submit value=all name=cityclick id=\"rem\">
</form>"; 
while($row=$result->fetch_assoc()){
    $cid=$row['cid'];
    $sql = "SELECT cityname from city where cityid=$cid";    
$result1=$conn->query($sql);
$row1=$result1->fetch_assoc();
$nam=$row1['cityname'];


echo"<form method=POST >
<input type=text value=$cid name=val style=display:none;position:absolute;top:0;width:10%;>
<input type=submit value=$nam name=cityclick id=\"rem\" >
</form>";    
}
echo "</div>";
echo "</div><div style=\"display:inline-block;width:60%;border-left:1px solid black;\">";



print_cars($conn,$sql_act,$un);


echo "</div>";
}


if(isset($_POST['cityclick'])){


 //$GLOBALS['sql_act']=$GLOBALS['sql_act']."and city=$cid";
 ob_end_clean();
 ob_start(); 
 $cid=$_POST['val'];
 
 
 echo '<form method="POST" style="margin-bottom:4%;">
<input type="submit" value="View Profile" name="details" style="margin-bottom:4%;" id="rem">
<hr/>
</form>';

 echo '
<div style=display:inline-block;width:30%;vertical-align:top;>
<form method="POST">
    <input type="submit" name="filtercity" value="filter by city" style=postion:relative; id="rem">
    </form>
    </div>';
echo "<div style=\"display:inline-block;width:60%;border-left:1px solid black;\">";
if($cid!="all"){
 print_cars($conn,$sql_act." and cid='$cid'",$un);
 echo "</div>";
}
else{
    print_cars($conn,$sql_act,$un);
 echo "</div>";
}
}


if (isset($_POST['book'])){
    
    $carnum = mysqli_real_escape_string($conn, $_REQUEST['nm']);
    

   
header("Location:book_page.php?un=$un&carnum=$carnum");                                                          
}


/*---------*/

?>

<html>
<head>
<head> 
<link type="text/css" rel="stylesheet" href="css/custhome.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Stay Connected</title>
</head>
</head>

</html>