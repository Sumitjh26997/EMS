<?php

$mid=$_POST['mid'];
$rid=$_POST['rid'];
$con=mysqli_connect("localhost","root","12345","ems");

if (mysqli_connect_errno($con)) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query="DELETE FROM revoked WHERE revoker_id=$mid and revokee_id=$rid";
$result=mysqli_query($con,$query);
?>
<div id="block">
<button class='btn btn-danger' style='width:100%;' onclick='block()';>Block</button>;
 </div>
