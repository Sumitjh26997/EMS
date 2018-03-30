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
    <div class="box-body no-padding">
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
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Minister Status</h4>
                      <?php
                      echo $date;
                      echo $start;
                      echo $end;
                      echo $row['minister_id'];
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

                      <tr>

                        <td>1</td>
                        <td><img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:40%;max-height:30%;"></td>
                        <td>Shikhar Bhatt</td>
                        <td>Available</td>
                        <td><input type="checkbox" name="minister1" value="minister1"></td>
                      </tr>
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

                   <!-- <button class="btn btn-sm btn-info btn-flat ">Submit</button> -->



  <!-- </form> -->

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


</div>
<script src="js/jquery.js"></script>
<script type="text/javascript">

	var minister;
	//var limit;

	function multiple_values(inputclass){
		var val = new Array();
		$("."+inputclass+":checked").each(function() {
		    val.push($(this).val());
		});
		//val.push("none");
		return val;
	}

  function filter()
  {
    minister = multiple_values("minister");
    alert(minister);
  }

  function submitform()
  {
    var date=$('#date').val();
    var start=$('#start_time').val();
    var end=$('#end_time').val();
    $.post( '<?= Url::toRoute('program/schedule')?>',{'minister':minister,'date':date,'start':start,'end':end})
    .done(function(data){
            alert("success");
            $('body').html(data);
        })
        .fail(function() {
        alert( "error" );
    })
  }

  function open_modal()
  {
    document.getElementById('modal-default').style.display='block';
  }
</script>
