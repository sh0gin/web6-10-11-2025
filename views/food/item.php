<?php 
use app\models\Category;
use yii\bootstrap5\Html;

?><div class="p-2 border m-2">
    <div>
        <span>Название: </span>
        <?= $model->name ?><br>
        <span>Рецепт: </span>
        <?= $model->recipe ?><br>
        <span>Вес(гр): </span>
        <?= $model->weight ?><br>
        <span>Категория: </span>
        <?= Category::getTitle($model->category_id) ?><br>

        <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'p-1 btn btn-primary']) ?>
    </div>
</div>