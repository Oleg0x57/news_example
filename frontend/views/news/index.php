<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider->pagination->pageSize = 3;
$roots = \common\models\Category::find()->roots()->all();
foreach ($roots as $root) {
    //$children = $root->children()->select(['title', 'id'])->indexBy('id')->column();
    $children = $root->children()->all();
    foreach ($children as $category) {
        if(count($category->news) > 0){
            $menuItems[] = ['label' => $category->title, 'url' => ['/news/category', 'id' => $category->id]];
        }
    }
}
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="news-index row">
    <div class="col-sm-3">
        <?php echo Nav::widget([
            'options' => ['class' => 'nav-sidebar'],
            'items' => $menuItems,
        ]); ?>
    </div>
    <div class="col-sm-9">
        <?php echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => 'announce',
        ]); ?>
    </div>
</div>
