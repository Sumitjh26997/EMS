<?php
$id=$_POST['sendid'];
$con=mysqli_connect("localhost","root","12345","ems");

if (mysqli_connect_errno($con)) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//echo $date;
$query="SELECT * FROM engaged e JOIN program p ON p.id=e.program_id WHERE e.minister_id=$id AND attending=0";

$result = mysqli_query($con,$query);

if(!empty($result))
{
  ?>
  <i class="fa fa-bell-o"></i>
  <span class="label label-warning">New</span>
  <?php
}?>
