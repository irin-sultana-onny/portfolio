<?php
 session_start();
 include_once 'dbconnect.php';
$query = "SELECT * FROM users WHERE designation=1 && chefavlinfo=1";
$result = mysqli_query($con,$query);
?>
<select name="selectchef">
<?php while ($row=mysqli_fetch_array($result)) {
	?>
	<option value="<?php echo $row['user_name'];?>"> <?php echo $row['user_name'];
	?>
	 </option>
<?php
}
?>
</select>
