<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
$con = mysqli_connect("157.112.187.122","ss945906_onny","onny1234","ss945906_restaurant");
if(!$con)
{
	die('oops connection problem ! --> '.mysqli_error());
}
// if(!mysqli_select_db("ss945906_restaurant"))
// {
// 	die('oops database selection problem ! --> '.mysqli_error());
// }

?>
