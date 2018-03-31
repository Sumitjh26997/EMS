<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-9">

          <!-- Profile Image -->

          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <img class="profile-user-img img-responsive img-circle" src="/EMS/program/photos/<?=Yii::$app->user->identity->image?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?=Yii::$app->user->identity->username?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i>Designation</strong>

              <p class="text-muted">
                <?=Yii::$app->user->identity->designation?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?=Yii::$app->user->identity->location?></p>

              <hr>

              <strong><i class="fa fa-calendar margin-r-5"></i>Date of Birth</strong>

              <p class="text-muted">
                <?=Yii::$app->user->identity->dob?>
              </p>

              <hr>

              <strong><i class="fa fa-group margin-r-5"></i>Ministry</strong>

              <p class="text-muted">
                <?=Yii::$app->user->identity->ministry?>
              </p>

              <hr>

              <strong><i class="fa fa-home margin-r-5"></i>Party</strong>

              <p class="text-muted">
                <?=Yii::$app->user->identity->party?>
              </p>

              <hr>


              <strong><i class="fa fa-calendar margin-r-5"></i>Join Date</strong>

              <p class="text-muted">
                <?=Yii::$app->user->identity->join_date?>
              </p>

              <hr>
              <input >
              <div id="block">
                <?php
                if($flag==1)
                {
                  echo "<button class='btn btn-danger' style='width:100%;' onclick='unblock();'>Unblock</button>";
                }
                if($flag==0)
                {
                  echo "<button class='btn btn-danger' style='width:100%;' onclick='block()';>Block</button>";
                }
                 ?>
               </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
<script src='js/jquery.js'></script>
<script>
function block()
{
  $
}

function unblock()
{

}
</script>
