<?php

$servername = "157.112.187.122";
$username = "ss945906_onny";
$password = "onny1234";
$dbname = "ss945906_restaurant";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	echo "connection error";
    die("Connection failed: " . $conn->connect_error);
}

$sql ="INSERT INTO requestcomplete(name_id)
VALUE ('$_POST[name]')";

if ($conn->query($sql) === TRUE) {

	echo "Your Order is successfully record";


} else {
	echo "ki j hosche kichu bujhtesi na";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
