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
              <script type="text/javascript">

                var minister;
                var final;
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

                function filter_final()
                {
                    final=multiple_values("final");
                    alert(final);
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

                function submitfinal()
                {
                  alert("askjdhasljd");
                  var date=$('#date_final').val();
                  var start=$('#start_final').val();
                  var end=$('#end_final').val();
                  $.post( '<?= Url::toRoute('program/createme')?>',{'minister':final,'date':date,'start':start,'end':end})
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
                </div>

                   <!-- <button class="btn btn-sm btn-info btn-flat ">Submit</button> -->



  <!-- </form> -->


</div>
<script src="js/jquery.js"></script>
<script type="text/javascript">

	var minister;
  var final;
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

  function filter_final()
  {
      final=multiple_values("final");
      alert(final);
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

  function submitfinal()
  {
    alert("askjdhasljd");
    var date=$('#date_final').val();
    var start=$('#start_final').val();
    var end=$('#end_final').val();
    $.post( '<?= Url::toRoute('program/createme')?>',{'minister':final,'date':date,'start':start,'end':end})
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
