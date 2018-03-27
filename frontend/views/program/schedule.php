<?php

/* @var $this yii\web\View */

$this->title = 'EMS';
?>

<div class="site-index">
  <form id="minister">
    <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:50%;max-height:20%;">
                      <a class="users-list-name" href="#">Shikhar Bhatt</a>
                      <span class="users-list-date">Today</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                    <li>
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
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                    <li>
                      <img src="photos/shikhar.jpg" alt="User Image" style="border-radius:50%;max-width:50%;max-height:20%;">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                      <input type="checkbox" name="minister1" value="minister1">
                    </li>
                  </ul>
                  <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
                   <input type="date" class="btn btn-sm btn-info btn-flat" style="width:20%">
                   <input type="time" class="btn btn-sm btn-info btn-flat" style="width:20%">
                                               
                  <!-- /.users-list -->
                </div>
                <br>
                   <!-- <button class="btn btn-sm btn-info btn-flat ">Submit</button> -->
<button type="button" class="btn btn-block btn-success btn-lg" style="width:30%; align:center;" data-toggle="modal" data-target="#modal-default">
                Submit
              </button>
      
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
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</div>




