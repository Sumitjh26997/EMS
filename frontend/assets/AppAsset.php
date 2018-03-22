<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap3-wysihtml5.min.css',
        'css/daterangepicker.css',
        'css/bootstrap-datepicker.min.css',
        'css/jquery-jvectormap.css',
        'css/morris.css',
        'css/skins/_all-skins.min.css',
        'css/AdminLTE.min.css',
        'css/ionicons.min.css',
        'css/font-awesome.min.css',
        'css/bootstrap.min.css',
        'css/site.css',
    ];
    public $js = [
        'js/demo.js',
        'js/dashboard.js',
        'js/adminlte.min.js',
        'js/fastclick.js',
        'js/jquery.slimscroll.min.js',
        'js/bootstrap3-wysihtml5.all.min.js',
        'js/bootstrap-datepicker.min.js',
        'js/daterangepicker.js',
        'js/moment.min.js',
        'js/jquery.knob.min.js',
        'js/jquery-jvectormap-world-mill-en.js',
        'js/jquery-jvectormap-1.2.2.min.js',
        'js/jquery.sparkline.min.js',
        'js/morris.min.js',
        'js/raphael.min.js',
        'js/bootstrap.min.js',
        'js/jquery-ui.min.js',
        'js/jquery.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
