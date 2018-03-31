<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */
$sendid=Yii::$app->user->identity->id;

?>
<head>
  <link rel="shortcut icon" href="mospi.webp">
</head>

<header class="main-header">
<input id="id" value="<?=Yii::$app->user->identity->id?>" hidden>
    <?= Html::a('<span class="logo-mini">EMS</span><span class="logo-lg"><b>EMS</b></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">


                <!-- <li class="dropdown notifications-menu" >
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="bell">
                        <i class="fa fa-bell-o"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"></li>
                        <li>

                            <ul class="menu" id="ul">

                            </ul>
                        </li>
                    </ul>
                </li> -->

                <li class="dropdown notifications-menu" >
                  <a href="<?= Url::to(['/site/progs','id'=>$sendid])?>" class="dropdown-toggle" id="bell">
                        <i class="fa fa-bell-o"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" id="ul">

                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?=Yii::$app->user->identity->username?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?=$sendid?>
                                <?=Yii::$app->user->identity->username?> - <?=Yii::$app->user->identity->designation?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(
                                    'Profile',
                                    ['/site/profile'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->

            </ul>
        </div>
    </nav>
</header>
<script src="js/jquery.js"></script>
<script>
  $(document).ready(function(){
  //  var previous='';
    var myint;
    var str=$('#id').val();
    myint=setInterval(function(){
       $('#ul').load('/EMS/frontend/views/site/notification.php',{'sendid':str})
       $('#bell').load('/EMS/frontend/views/site/ncount.php',{'sendid':str})
    },1000);
  })
</script>
