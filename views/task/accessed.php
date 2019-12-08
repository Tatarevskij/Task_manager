<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Task accessed';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'title',
                'value' => function ($data){
                    return Html::a(Html::encode($data->title), ['task/view', 'id' => $data->id]);
                },
                'format' => 'raw'
            ],
            'description:ntext',
            [
                    'attribute' => 'creator.username',
                    'value' => function ($data){
                       return Html::a(Html::encode($data->creator->username), ['user/view', 'id' => $data->creator->id]);
                    },
                    'format' => 'raw'
            ],
            'created_at:dateTime',
            'updated_at:dateTime',
            ]
    ]); ?>

    <?php Pjax::end(); ?>

</div>
