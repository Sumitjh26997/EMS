<?php
$id=$_POST['sendid'];
$con=mysqli_connect("localhost","root","12345","ems");

if (mysqli_connect_errno($con)) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//echo $date;
$query="SELECT * FROM engaged e JOIN program p ON p.id=e.program_id WHERE e.minister_id=$id AND attending=0";
$result = mysqli_query($con,$query);

//$query1="SELECT username FROM user WHERE id=$query['init_weight']";
//$result1 = mysqli_query($con,$query1);
while($row=mysqli_fetch_array($result))
{

?>


<li>
    <a href="#">
        <i class="fa fa-users text-red"></i>You have been invited to a <?=$row['type']?> on <?=$row['date']?>.
    </a>
</li>

<?php } ?>
