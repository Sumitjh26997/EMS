<?php

use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'EMS';

$con=mysqli_connect("localhost","root","12345","ems");

if (mysqli_connect_errno($con)) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query="SELECT * FROM engaged e JOIN program p ON p.id=e.program_id WHERE e.minister_id=$id AND attending=0 ORDER BY p.timestamp DESC";

$results = mysqli_query($con,$query);
$sendid=Yii::$app->user->identity->id;  
?>

<div class="row">
  <div class="col-sm-4">
  </div>
        <div class="col-sm-4" >
        <h2>Your Notifications</h2>
        </div>
        <div class="col-sm-4">
        </div>
</div>

<?php
while($row=mysqli_fetch_array($results))
{
  // $init=$row['init_weight'];
  // $x="SELECT * FROM user WHERE id=$init";
  // $y = mysqli_query($con,$x);
  // $z=mysqli_fetch_array($y);
  $init=$row['init_weight'];
  $j="SELECT * FROM user  WHERE id=$init";

$m = mysqli_query($con,$j);
$f=mysqli_fetch_array($m);
?>
<div class="row">
  <div class="col-sm-2">
  </div>
<div class="col-md-8">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><?=$row['name']?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
      <div class="box-body">


        <div class="form-group col-sm-4">
          <label>Initiator</label>
          <input  class="form-control" value="<?=$f['username']?>" disabled >
        </div>

        <div class="form-group col-sm-4">
          <label>Designation</label>
          <input  class="form-control" value="<?=$f['designation']?>" disabled >
        </div>

        <div class="form-group col-sm-4">
          <label>Ministry</label>
          <input  class="form-control" value="<?=$f['ministry']?>" disabled >
        </div>


        <div class="form-group col-sm-4">
          <label>Date of Meeting</label>
          <input  class="form-control" value="<?=$row['date']?>" disabled >
        </div>

        <div class="form-group col-sm-4">
          <label>Start Time</label>
          <input  class="form-control" value="<?=$row['start_time']?>" disabled >
        </div>
        <div class="form-group col-sm-4">
          <label>End Time</label>
          <input  class="form-control" value="<?=$row['end_time']?>" disabled >
        </div>
        
        <div class="form-group col-sm-4">
          <label>Meeting Type</label>
          <input  class="form-control" value="<?=$row['type']?>" disabled >
        </div>
        
        <div class="form-group col-sm-4">
          <label>Location</label>
          <input  class="form-control" value="<?=$row['location']?>" disabled >
        </div>

        <div class="form-group col-sm-4">
          <label>Priority</label>
          <input  class="form-control" value="<?=$row['priority']?>" disabled >
        </div>

        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control"  disabled ><?=$row['description']?></textarea>
        </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <div class="col-sm-10" style="align:right;">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
            Attend
          </button>
       </div>
      
       <div style="align:right;">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
          Reject
        </button>
      </div>
      </div>
    </form>
  </div>
  <!-- /.box -->

  <!-- Form Element sizes -->

  <!-- /.box -->


  <!-- /.box -->

  <!-- Input addon -->

  <!-- /.box -->



</div>
</div>
<div class="modal modal-info fade" id="modal-info">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Info Modal</h4>
      </div>
      <div class="modal-body">
        <form action="<?=Url::to(['/site/progs','id'=>$sendid])?>" method="post">
          <input id="pid" value="<?=$row['id']?>" name="pid" style="background:'blue';" hidden>
  <input id="mid" value="<?=Yii::$app->user->identity->id?>" name="mid" style="background:'blue';" hidden>
        <textarea name="message" id="message" class="btn btn-info" ></textarea>
        <input name="attending" id="attending" value=1 style="background:'blue';" hidden>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline">Submit</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <!-- /.modal-dialog -->
  <div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Danger Modal</h4>
        </div>
        <div class="modal-body">
          <form action="<?=Url::to(['/site/progs','id'=>$sendid])?>" method="post">
            <input id="pid" value="<?=$row['id']?>" name="pid" style="background:'blue';" hidden>
    <input id="mid" value="<?=Yii::$app->user->identity->id?>" name="mid" style="background:'blue';" hidden>
          <textarea name="message" id="message" class="btn btn-danger" ></textarea>
          <input name="attending" id="attending" value=-1 style="background:'blue';" hidden>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline">Submit</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php }?>
