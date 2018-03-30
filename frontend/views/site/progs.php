<?php

/* @var $this yii\web\View */

$this->title = 'EMS';


$con=mysqli_connect("localhost","root","12345","ems");

if (mysqli_connect_errno($con)) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


//echo $date;
$query="SELECT * FROM engaged e JOIN program p ON p.id=e.program_id WHERE e.minister_id=$id AND attending=0";
$result = mysqli_query($con,$query);

?>

<div class="row">

        <div class="col-sm-4" style="margin-left:10%">
        <h2>Your Notifications</h2>
        </div>
</div>

<?php
while($row=mysqli_fetch_array($result))
{
?>
<div class="row">
  <div class="col-sm-2">
  </div>
<div class="col-md-8">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Quick Example</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" id="exampleInputFile">

          <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Check me out
          </label>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
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
<?php }?>
