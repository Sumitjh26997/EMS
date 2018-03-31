<?php

/* @var $this yii\web\View */

$this->title = 'EMS';
?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h2 class="">My Schedule</h2>
        </div>
        <br>
        <!-- /.box-header -->
        <div class="box-body">
          Search : 
          <select name="month">
            <option value="1">Jan</option>
            <option value="2">Feb</option>
            <option value="3">Mar</option>
            <option value="4">Apr</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">Aug</option>
            <option value="9">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
          </select>
          <select name="year">
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
          </select>

          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Program ID</th>
              <th>Program Name</th>
              <th>Location</th>
              <th>Date</th>
              <th>Start Time</th>
              <th>End Time</th>
            </tr>
            </thead>

            <tbody>
              <?php foreach($tables as $entry)
              {?>
            <tr>
              <td><?=$entry->id?></td>
              <td><?=$entry->name?></td>
              <td><?=$entry->location?></td>
              <td><?=$entry->date?></td>
              <td><?=$entry->start_time?></td>
              <td><?=$entry->end_time?></td>
            </tr>
          <?php }?>
            </tbody>

          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
