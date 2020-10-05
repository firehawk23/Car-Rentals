<?php

$conn = new mysqli("localhost","root","","dbms_project");
if($conn->connect_error)
die("not connected:".$conn->connect_error);

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

foreach ($city as $chak){
    $sql = "INSERT into city values('$i','$chak')";

    if ($conn->query($sql) === FALSE) 
         {
        echo "Error updating record: " . $conn->error;
    }
    $i++;
}
echo "cities done";



?>