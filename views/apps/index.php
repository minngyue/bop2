<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apps-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Apps', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'appid',
            'appkey',
            'app_secret',
            'name',
            'slug',
            //'logo',
            //'remark',
            //'mode',
            //'type',
            //'stype',
            //'state',
            //'pay_state',
            //'score',
            //'is_original',
            //'open_date',
            //'created_user',
            //'created_at',
            //'updated_at',
            //'published_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
