<?php

/* @var $this yii\web\View */
use dosamigos\datepicker\DatePicker;
use kartik\time\TimePicker;
use yii\helpers\Html;
use backend\models\User;
use yii\helpers\Url;

//use kartik\widgets\ActiveForm;
//use kartik\widgets\TimePicker;

$this->title = 'EMS';

/*oreach($minister as $m)
{
	echo $m->username;
	echo " -------- ";
	echo $m->email;
	echo " **** ";
}*/
// echo TIME($start_time).'<br>';
// echo '<br>'.$start_time;
// echo $end_time;
// echo $date;

// echo TIME('14:15:00');

$start_time=TIME($start_time);
$end_time=TIME($end_time);
//print_r($minister);



?>
<h4 class="modal-title">Minister Status</h4></b>
                    <br>
                     
                                      
                  <form id="select">
          <div class="box-body no-padding">

                       
                  <div class="box-header">
                     </div>
                  <!-- /.box-hea                        // echo $ministers[0]->username;

der -->
                  <!-- <div class="box-body"> -->
                    <form action="<?=Url::to(['/program/createme']) ?>" method="post">
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
                         foreach ($minister as $row) {?>
                      <tr>
                           <td><?=$row['id']?></td>
                           <td><img src="photos/<?=$row['image']?>" alt="User Image" style="border-radius:50%;max-width:50px;max-height:50px;min-width:50px;min-height:50px;"></td>
                           <td><?=$row['username']?></td>
                           <td>
                             <?php $flag=1;
                              foreach ($busy as $key) {
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
                           <td><input type="checkbox" name="checkbox[]" class="final" id="<?=$row['id']?>" value="<?=$row['id']?>"
                             <?php $flag=1;
                              foreach ($busy as $key) {
                                if($key['minister_id']==$row['id'])
                                {
                                  $flag=0;
                                  break;
                                }
                              }
                              if($flag==1) {
                                echo "checked";
                              }
                              ?>>
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
                    <button type="submit">Submit</button>
                 </form>

                        <!-- /.users-list -->
                      </div>
                      <br>
                         <!-- <button class="btn btn-sm btn-info btn-flat ">Submit</button> -->

</div>
        </form>
        