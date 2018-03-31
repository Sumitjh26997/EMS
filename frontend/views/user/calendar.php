<?php 

$con=mysqli_connect("localhost","root","12345","ems");


      if (mysqli_connect_errno($con)) {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $show ="select * from revoked where revoker_id=$rid and revokee_id=$mid";

      $result=mysqli_query($con,$show);

      if(mysqli_num_rows($result)==0)
      {
      	$busy="SELECT p.* from program p inner join engaged e on p.id=e.program_id where e.minister_id=$rid and e.attending=1 order by p.date,p.start_time ASC";
      }
      else
      {
      	$busy="SELECT p.* from program p inner join engaged e on p.id=e.program_id where e.minister_id=$rid and e.attending=1 and p.program_weight=1 order by p.date,p.start_time ASC";      	
      }
      $results=mysqli_query($con,$busy);
      //print_r($results);
?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h2 class="">My Schedule</h2>
        </div>
        <br>
        <!-- /.box-header -->
        <div class="box-body" id="onsearch">

          <label>Search :</label>

          <br>
          <input id="mid" value="<?=Yii::$app->user->identity->id?>" hidden>
          <div class="col-sm-3">
          <label>By Month : </label> 
          <select id="month" class="form-control select2" style="width:50%">
            <option value="default" selected>--</option>
            <option value="01">Jan</option>
            <option value="02">Feb</option>
            <option value="03">Mar</option>
            <option value="04">Apr</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">Aug</option>
            <option value="09">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
          </select>
        </div>
        <div class="col-sm-3">
          <label>By Year : </label> 
          <select id="year" class="form-control select2" style="width:50%">
            <option value="default" selected>--</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
          </select>
        </div>
          <div class="col-sm-3">
          <label>By Program Name : </label><br>
          <input id="text" type="text" value="" placeholder="default" class="form-group">
        </div>
        <div class="col-sm-3">
          <label></label><br>
         <button  type="button" class="btn btn-block btn-success btn-sm" style="width:50%;" onclick="submit();">
                Submit
              </button>
        </div>
          <br><br><br><br>
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
               <?php while($entry=mysqli_fetch_array($results))
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
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<script src="/EMS/js/jquery.js"></script>
<script type="text/javascript">
function submit()
{
  var m=$('#month').val();
  var y=$('#year').val();
  var t=$('#text').val();
  var mid=$('#mid').val();
  $('#schedule').load('/EMS/frontend/views/site/get.php',{'m':m,'y':y,'t':t,'mid':mid});
}
</script>