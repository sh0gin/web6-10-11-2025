<?php

use app\models\CategoryProduct;
use yii\bootstrap5\Html;
?>
<div class="p-2 border m-2">
    <div>
        <span>Название: </span>
        <?= $model->name ?><br>
        <span>Цена за единицу: </span>
        <?= $model->pricePerOne ?><br>
        <span>Единицы измерения: </span>
        <?= $model->unitsOfMeasurement ?><br>
        <span>Калории: </span>
        <?= $model->calories ?><br>
        <span>Категория: </span>
        <?= CategoryProduct::getTitle($model->category_id) ?><br>

        <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'p-1 btn btn-primary']) ?>
    </div>
</div>