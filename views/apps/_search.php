<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AppsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apps-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'appid') ?>

    <?= $form->field($model, 'appkey') ?>

    <?= $form->field($model, 'app_secret') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'mode') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'stype') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'pay_state') ?>

    <?php // echo $form->field($model, 'score') ?>

    <?php // echo $form->field($model, 'is_original') ?>

    <?php // echo $form->field($model, 'open_date') ?>

    <?php // echo $form->field($model, 'created_user') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'published_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
