<?php

use app\models\Category;
use app\models\CategoryProduct;
use yii\bootstrap5\Html;

?><div class="p-2 border m-2">
    <div>
        <span>Количество продуктов: </span>
        <?= $model->countProduct  ?><br>
        <span>Очередь добавления: </span>
        <?= $model->countAddition ?><br>
        <span>Количество порций: </span>
        <?= $model->countPortion ?><br>
        <span>Продукт нуждается в обработке?: </span>
        <?= $model->beforeWork ?><br>
        <span>Название блюда: </span>
        <?= $model->food->name ?><br>
        <span>Рецепт блюда: </span>
        <?= $model->food->recipe ?><br>
        <span>Вес блюда(гр): </span>
        <?= $model->food->weight ?><br>
        <span>Категория блюда: </span>
        <?= Category::getTitle($model->food->category_id) ?><br>
        <span>Название продуктов: </span>
        <?= $model->product->name ?><br>
        <span>Цена за единицу продукта: </span>
        <?= $model->product->pricePerOne ?><br>
        <span>Единицы измерения продукта: </span>
        <?= $model->product->unitsOfMeasurement ?><br>
        <span>Калории продукта: </span>
        <?= $model->product->calories ?><br>
        <span>Категория продукта: </span>
        <?= CategoryProduct::getTitle($model->product->category_id) ?><br>

        <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'p-1 btn btn-primary']) ?>
    </div>
</div>