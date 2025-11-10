<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property int $pricePerOne
 * @property int $unitsOfMeasurement
 * @property int $calories
 *
 * @property CategoryProduct $category
 * @property Composition[] $compositions
 * @property Measurement $unitsOfMeasurement0
 */
class Product extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'pricePerOne', 'unitsOfMeasurement', 'calories'], 'required'],
            [['category_id', 'pricePerOne', 'unitsOfMeasurement', 'calories'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryProduct::class, 'targetAttribute' => ['category_id' => 'id']],
            [['unitsOfMeasurement'], 'exist', 'skipOnError' => true, 'targetClass' => Measurement::class, 'targetAttribute' => ['unitsOfMeasurement' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Навание',
            'pricePerOne' => 'Цена за штукиу',
            'unitsOfMeasurement' => 'Единица измерения',
            'calories' => 'Калории',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CategoryProduct::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Compositions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompositions()
    {
        return $this->hasMany(Composition::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[UnitsOfMeasurement0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitsOfMeasurement0()
    {
        return $this->hasOne(Measurement::class, ['id' => 'unitsOfMeasurement']);
    }

}
