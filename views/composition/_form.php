<?php

use app\models\BofereWork;
use app\models\Food;
use app\models\Product;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\composition $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="composition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'countAddition')->textInput() ?>

    <?= $form->field($model, 'countProduct')->textInput() ?>

    <?= $form->field($model, 'countPortion')->textInput() ?>

    <?= $form->field($model, 'beforeWork')->dropDownList(BofereWork::find()->select('alais')->indexBy('id')->column(), ['prompt' => 'Выберите необходимость предварительно обработки']) ?>

    <?= $form->field($model, 'food_id')->dropDownList(Food::find()->select('name')->indexBy('id')->column(), ['prompt' => 'Выберите блюдо']) ?>

    <?= $form->field($model, 'product_id')->dropDownList(Product::find()->select('name')->indexBy('id')->column(), ['prompt' => 'Выберите продукт']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
