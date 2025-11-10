<?php

use app\models\Category;
use app\models\CategoryProduct;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\composition $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Составы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="composition-view">


    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'countAddition',
            'countProduct',
            'countPortion',
            'beforeWork',
            [
                'attribute' => 'Рецепт блюда',
                'value' => $model->food->recipe
            ],
            [
                'attribute' => 'Вес блюда',
                'value' => $model->food->weight
            ],
            [
                'attribute' => 'Категория блюда',
                'value' => Category::getTitle($model->food->category_id)
            ],
            [
                'attribute' => 'Название продуктов',
                'value' => $model->product->name
            ],
            [
                'attribute' => 'Цена за единицу продукта',
                'value' => $model->product->pricePerOne
            ],
            [
                'attribute' => 'Единицы измерения продукта',
                'value' => $model->product->unitsOfMeasurement
            ],
            [
                'attribute' => 'Калории продукта',
                'value' => $model->product->calories
            ],
            [
                'attribute' => 'Категория продукта',
                'value' => CategoryProduct::getTitle($model->product->category_id)
            ],
            'food_id',
            'product_id',
        ],
    ]) ?>

</div>
