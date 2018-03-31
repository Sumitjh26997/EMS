<?php 
$con=mysqli_connect("localhost","root","12345","ems");

$mid=$_POST['mid'];
$m=$_POST['m'];
$y=$_POST['y'];
$t=$_POST['t'];




      if (mysqli_connect_errno($con)) {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $busy ="select p.* from engaged e join program p on p.id = e.program_id where  e.attending = 1 and e.minister_id=$mid ";
      if($m!='default'){
      	$busy .= "and p.date like '%-$m-%'";


      }
      if($y!='default'){
      	$busy .= "and p.date like '$y-%-%'";
      }

      if($t!=''){
      	$busy .= "and p.name like '%$t%'";
      }
      $result=mysqli_query($con,$busy);
?>


          <table id="schedule" class="table table-bordered table-hover" style="overflow-x:1">
            <thead>
            <tr>
              <th>Program ID</th>
              <th>Program Name</th>
              <th>Location</th>
              <th>Date</th>
              <th>Start Time</th>
              <th>End Time</th>
            </tr>
            </thead>

            <tbody>
              <?php while($entry=mysqli_fetch_array($result))
              {?>
            <tr>
              <td><?=$entry['id']?></td>
              <td><?=$entry['name']?></td>
              <td><?=$entry['location']?></td>
              <td><?=$entry['date']?></td>
              <td><?=$entry['start_time']?></td>
              <td><?=$entry['end_time']?></td>
            </tr>
          <?php }?>
            </tbody>

          </table>
