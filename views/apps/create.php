<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apps */

$this->title = 'Create Apps';
$this->params['breadcrumbs'][] = ['label' => 'Apps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
