<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\composition $model */

$this->title = 'Обновить состав';
$this->params['breadcrumbs'][] = ['label' => 'Состав', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="composition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
