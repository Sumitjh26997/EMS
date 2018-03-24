<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Engaged */

$this->title = 'Create Engaged';
$this->params['breadcrumbs'][] = ['label' => 'Engageds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engaged-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
