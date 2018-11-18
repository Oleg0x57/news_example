<?php

/* @var $this yii\web\View */

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

$dataProvider = new ActiveDataProvider([
    'query' => \common\models\News::find(),
    'pagination' => [
        'pageSize' => 3,
    ],
]);
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'announce',
]);