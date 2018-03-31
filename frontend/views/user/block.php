<?php

$mid=$_POST['mid'];
$rid=$_POST['rid'];
$con=mysqli_connect("localhost","root","12345","ems");

if (mysqli_connect_errno($con)) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query="INSERT into revoked(revoker_id,revokee_id) values($mid,$rid)";
$result=mysqli_query($con,$query);
?>
<div id="block">
<button class='btn btn-danger' style='width:100%;' onclick='unblock()';>Unblock</button>;
 </div>
