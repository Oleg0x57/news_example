<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\widgets\ListView;

$dataProvider->pagination->pageSize = 3;

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'announce',
]);