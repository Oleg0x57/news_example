<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

/* @var $model common\models\News */
?>
<div class="post">
    <h4><?= Html::encode($model->title) ?></h4>

    <?= HtmlPurifier::process($model->announcement) ?>

    <?= Html::a('Читать подробнее', ['/news/view', 'id' => $model->id]) ?>
</div>