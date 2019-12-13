<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apps */

$this->title = 'Update Apps: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->appid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apps-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
