<?php
use yii\helpers\Url;
use dosamigos\datepicker\DatePicker;
use kartik\time\TimePicker;
$this->title='Profile';
print_r($checklist);
?>
    <form action="<?=Url::to(["/site/ins"])?>" method ="post">
      <h2>Create Form</h2>
        <div>
          <?php foreach($checklist as $ll){


            echo '<input type="checkbox" name="checkbox[]" class="final" id="<?=$ll?>" value="<?=$ll?>" checked hidden>';

          }?>
        <label>Name</label>
        <input name="name" type="text" class="form-control">
<br>        <label>Type</label>
        <select class="form-control" name="type">
          <option value="meetings">Meeting</option>
          <option value="Workshop">Workshop</option>
          <option value="Seminar">Seminar</option>
        </select>
<br>
        <label>Location</label>
        <input type="text" name="location" class="form-control">
<br>
        <label>Date</label>
        <?= DatePicker::widget([
              'name' => 'date',
              'id' => 'date',
              'value' => $date,
              //'minDate' => '0',
              //'datesDisabled' => date("Y-m-d"),
              'template' => '{addon}{input}',
                  'clientOptions' => [
                      'autoclose' => true,
                      'format' => 'yyyy-mm-dd'
                  ]
              ]);?>
        <label>Start time</label>
        <?=TimePicker::widget([
           'id' => 'start_time',
           'name' => 'start_time',
           'value'=> $start,
           'pluginOptions' => [
             'showSeconds' => false
           ]
         ]);?>
<br>
        <label>End time</label>
        <?=TimePicker::widget([
          'id' => 'end_time',
          'name' => 'end_time',
          'value'=> $end,
          'pluginOptions' => [
            'showSeconds' => false
          ]
         ]);?>
<br>
        <label>Description</label>
        <textarea class="form-control" name="description"></textarea>
        <br>
        <label>Priority</label>
        <input type="radio" name="priority" value="low">low
        <input type="radio" name="priority" value="medium">medium
        <input type="radio" name="priority" value="high">high
        <input type="text" name="init" value="<?=Yii::$app->user->identity->id?>" hidden>
        <br><br>
        <button type="submit" class="btn btn-info">submit</button>
      </div>
    </form>
