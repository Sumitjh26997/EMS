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
?>
<?php
  if($flag==1)
  {
    echo $flag;
    echo "<script>$('#modal-default').modal('show')</script>"
    ?>
  <?php
  }
 ?>
<div class="site-index">
  <!-- <form id="minister"> -->
    <div class="box-body no-padding" id="boxload">
                  <ul class="users-list clearfix">
                    <?php foreach($ministers as $minister) {?>
                    <li>
                      <div class="<?php echo $minister['id']?>">
                        <img src="photos/<?php echo $minister['image']?>" alt="User Image" style="border-radius:50%;max-width:100px;max-height:100px;min-width:100px;min-height:100px;">
                        <a class="users-list-name" href="#"><?php echo $minister['username']?></a>
                        <span class="users-list-date"><?php echo $minister['designation']?></span>
                        <input type="checkbox" class="minister" id="<?php echo $minister['id']?>" value="<?php echo $minister['id']?>"
                        onclick="filter()">
                      </div>
                    </li>
                    <?php } ?>
                  </ul>
                  <br>
                  <div class="col-sm-4 form-group">
                <label>Date:</label>
                <?= DatePicker::widget([
                      'name' => 'date',
                      'id' => 'date',
                      'value' => date("Y-m-d"),
                      //'minDate' => '0',
                      //'datesDisabled' => date("Y-m-d"),
                      'template' => '{addon}{input}',
                          'clientOptions' => [
                              'autoclose' => true,
                              'format' => 'yyyy-mm-dd'
                          ]
                      ]);?>
                </div>

               <div class="col-sm-4 form-group">
               <label>Start Time:</label>
               <?=TimePicker::widget([
                  'id' => 'start_time',
                	'name' => 'start_time',
                	'pluginOptions' => [
                		'showSeconds' => false
                	]
                ]);?>
              </div>

               <!--  <br><br><br>  -->
                <div class="col-sm-4 form-group">
                      <label>End Time:</label>
                      <?=TimePicker::widget([
                        'id' => 'end_time',
                       	'name' => 'end_time',
                       	'pluginOptions' => [
                       		'showSeconds' => false
                       	]
                       ]);?>
                       <br>
                       <!-- <button  type="button" class="btn btn-block btn-success btn-lg" style="width:50%;" data-toggle="modal" data-target="#modal-default"> -->
                       <button  type="button" class="btn btn-block btn-success btn-lg" style="width:50%;" onclick="submitform();">
                Submit
              </button>
               </div>
                <!-- /.input group -->

                  <!-- /.users-list -->

                <div class="col-sm-4 form-group">

            </div>

                </div>

                   <!-- <button class="btn btn-sm btn-info btn-flat ">Submit</button> -->



  <!-- </form> -->


</div>
