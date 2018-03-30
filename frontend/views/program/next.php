<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <b>  <h4 class="modal-title">Minister Status</h4></b>
        <br>
        <div class="col-sm-4 form-group">
        <label>Date:</label>
        <input class="form-control" id="date_final" value="<?=$date?>" disabled>

       </div>
       <div class="col-sm-4 form-group">
       <label>Start Time:</label>
       <input class="form-control" id="start_final" value="<?=$start?>" disabled>

      </div>
      <div class="col-sm-4 form-group">
      <label>End Time:</label>
      <input class="form-control" id="end_final" value="<?=$end?>" disabled>

     </div>
          <?php
          //echo $date;
          //echo $start;
          //echo $end;
          //echo $row['minister_id'];
            // foreach($row as $a){
            //    echo $a['minister_id'];
            //  }
            // echo $ministers[0]->username;

          ?>
        </div>
        <div class="modal-body">
         <form id="select">
<div class="box-body no-padding">

            <div class="box">
      <div class="box-header">
         </div>
      <!-- /.box-hea                        // echo $ministers[0]->username;

der -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th></th>
            <th>Minister Name</th>
            <th>Status</th>
            <th>Select</th>
          </tr>
          </thead>
          <tbody style="align:center;">
            <?php
             foreach ($checked as $row) {?>
          <tr>
               <td><?=$row['id']?></td>
               <td><img src="photos/<?=$row['image']?>" alt="User Image" style="border-radius:50%;max-width:50px;max-height:50px;min-width:50px;min-height:50px;"></td>
               <td><?=$row['username']?></td>
               <td>
                 <?php $flag=1;
                  foreach ($result as $key) {
                    if($key['minister_id']==$row['id'])
                    {
                      $flag=0;
                      break;
                    }
                  }
                  if($flag==0)
                  {
                    echo "<b><font style='color:red;'>Busy</font></b>";
                  }
                  else {
                    echo "<b><font style='color:green;'>Available</font></b>";
                  }
                  ?>

               </td>
               <td><input type="checkbox" name="checkbox" class="final" id="<?=$row['id']?>" value="<?=$row['id']?>"
                 <?php $flag=1;
                  foreach ($result as $key) {
                    if($key['minister_id']==$row['id'])
                    {
                      $flag=0;
                      break;
                    }
                  }
                  if($flag==1) {
                    echo "checked";
                  }
                  ?>
                  onclick="filterfinal();">
               </td>


            <!-- <td>1</td>

            <td><img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:40%;max-height:30%;"></td>
            <td>Shikhar Bhatt</td>
            <td>Available</td>
            <td><input type="checkbox" name="minister1" value="minister1"></td> -->
          </tr>
          <?php
           }
          ?>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

            <!-- /.users-list -->
          </div>
          <br>
             <!-- <button class="btn btn-sm btn-info btn-flat ">Submit</button> -->


</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submit_final();">Create Program</button>
           <!-- <?= Html::a(
                              'Create Program',
                              ['/program/create'],
                              ['data-method' => 'post', 'class' => 'btn btn-primary']
                          ) ?> -->

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
