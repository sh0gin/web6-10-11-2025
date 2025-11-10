<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\productSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'food1',
        'countAddition'
    ],
]) ?>

    <?php Pjax::end(); ?>

    <?= Html::a('Экспорт', 'export-fourth', ['class' => "btn btn-primary p-3 m-3"]) ?>

</div>