<?php

/* @var $this yii\web\View */
use dosamigos\datepicker\DatePicker;
use kartik\time\TimePicker;
use yii\helpers\Html;
use frontend\models\User;
use yii\helpers\Url; 

//use kartik\widgets\ActiveForm;
//use kartik\widgets\TimePicker;

$this->title = 'EMS';
?>

<div class="site-index">
  <form id="minister">
    <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php foreach($ministers as $minister ) {?>
                    <li>
                      <div class="<?php echo $minister['id']?>">
                        <img src="photos/<?php echo $minister['image']?>" alt="User Image" style="border-radius:50%;max-width:100px;max-height:100px;min-width:100px;min-height:100px;">
                        <a class="users-list-name" href="#"><?php echo $minister['username']?> Hello World</a>
                        <span class="users-list-date"><?php echo $minister['designation']?></span>
                        <input type="checkbox" id="<?php echo $minister['id']?>" value="<?php echo $minister['image']?>" 
                        onclick="multiple_values(<?php echo $minister['id']?>">
                      </div>
                    </li>
                    <?php } ?>
                    <!-- <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:50%;max-height:20%;">
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Yesterday</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                    <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:50%;max-height:20%;">
                      <a class="users-list-name" href="#">Jane</a>
                      <span class="users-list-date">12 Jan</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                    <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:50%;max-height:20%;">
                      <a class="users-list-name" href="#">John</a>
                      <span class="users-list-date">12 Jan</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                    <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:50%;max-height:20%;">
                      <a class="users-list-name" href="#">Alexander</a>
                      <span class="users-list-date">13 Jan</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                    <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:50%;max-height:20%;">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                     <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:50%;max-height:20%;">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                     <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:50%;max-height:20%;">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
 -->
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
                       <button  type="button" class="btn btn-block btn-success btn-lg" style="width:50%;" data-toggle="modal" data-target="#modal-default">
                Submit
              </button>
               </div>
                <!-- /.input group -->
              
                  <!-- /.users-list -->
                  
                <div class="col-sm-4 form-group">
  
            </div>
                </div>
                
                   <!-- <button class="btn btn-sm btn-info btn-flat ">Submit</button> -->



  </form>

<!-- <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Modal Examples</h3>
            </div>
            <div class="box-body">

            </div>
          </div>
        </div>
      </div> -->

      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Minister Status</h4>
              </div>
              <div class="modal-body">
               <form id="select">
    <div class="box-body no-padding">
                  <!-- <ol >
                    <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:10%;max-height:10%;">
                      Shikhar Bhatt
                      <span class="users-list-date">Today</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                    <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:10%;max-height:10%;">
                      Shikhar Bhatt
                      <input type="checkbox" name="minister1" value="minister1">
                      <span class="users-list-date">Today</span>
                      
                    </li>
                   
                    </ol> -->
                  <div class="box">
            <div class="box-header">
               </div>
            <!-- /.box-header -->
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
                <tr>
                  <td>1</td>
                  <td><img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:40%;max-height:30%;"></td>
                  <td>Shikhar Bhatt</td>
                  <td>Available</td>
                  <td><input type="checkbox" name="minister1" value="minister1"></td>
                </tr>
                <?php foreach($ministers as $minister ) {?>
                    <script type="text/javascript">check_selected(<?= $minister['id'] ?>);</script>
                    <?php } ?>
                <!-- <tr>
                  <td>1</td>
                  <td><img src="photos/shikh
                  ar.jpg" alt="User Image" style="border-radius:50%;max-width:40%;max-height:30%;"></td>
                  <td>Shikhar Bhatt</td>
                  <td>Available</td>
                  <td><input type="checkbox" name="minister1" value="minister1"></td>
                </tr>
                <tr>
                  <td>1</td>
                  <td><img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:40%;max-height:30%;"></td>
                  <td>Shikhar Bhatt</td>
                  <td>Available</td>
                  <td><input type="checkbox" name="minister1" value="minister1"></td>
                </tr>
                <tr>
                  <td>1</td>
                  <td><img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:40%;max-height:30%;"></td>
                  <td>Shikhar Bhatt</td>
                  <td>Available</td>
                  <td><input type="checkbox" name="minister1" value="minister1"></td>
                </tr>
                <tr>
                  <td>1</td>
                  <td><img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:40%;max-height:30%;"></td>
                  <td>Shikhar Bhatt</td>
                  <td>Available</td>
                  <td><input type="checkbox" name="minister1" value="minister1"></td>
                </tr>
                <tr>
                  <td>1</td>
                  <td><img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:40%;max-height:30%;"></td>
                  <td>Shikhar Bhatt</td>
                  <td>Available</td>
                  <td><input type="checkbox" name="minister1" value="minister1"></td>
                </tr>
                <tr>
                  <td>1</td>
                  <td><img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:40%;max-height:30%;"></td>
                  <td>Shikhar Bhatt</td>
                  <td>Available</td>
                  <td><input type="checkbox" name="minister1" value="minister1"></td>
                </tr> -->
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
                <?= Html::a(
                                    'Create Program',
                                    ['/program/create'],
                                    ['data-method' => 'post', 'class' => 'btn btn-primary']
                                ) ?>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</div>

