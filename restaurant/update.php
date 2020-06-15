<?php


$servername = "157.112.187.122";
$username = "ss945906_onny";
$password = "onny1234";
$dbname = "ss945906_restaurant";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



    $sql="UPDATE users SET  chefavlinfo=0 WHERE user_name=''";



	if ($conn->query($sql) === TRUE) {
    echo "New record updated successfully";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




?>
