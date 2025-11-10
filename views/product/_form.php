<?php

use app\models\CategoryProduct;
use app\models\Measurement;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'pricePerOne')->textInput() ?>
    
    <?= $form->field($model, 'unitsOfMeasurement')->dropDownList(Measurement::find()->select('unis')->indexBy('id')->column(), ['prompt' => 'Выберите единицу измерения']) ?>
    
    <?= $form->field($model, 'calories')->textInput() ?>
    <?= $form->field($model, 'category_id')->dropDownList(CategoryProduct::find()->select('category')->indexBy('id')->column(), ['prompt' => 'Выберите категорию']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
