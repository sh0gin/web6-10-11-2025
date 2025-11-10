<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "composition".
 *
 * @property int $id
 * @property int $countAddition
 * @property int $countProduct
 * @property int $countPortion
 * @property int $beforeWork
 * @property int $food_id
 * @property int $product_id
 *
 * @property BofereWork $beforeWork0
 * @property Food $food
 * @property Product $product
 */
class Composition extends \yii\db\ActiveRecord
{
    public $food1;
    public $product1;
    public $calories;
    public $count;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'composition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countAddition', 'countProduct', 'countPortion', 'beforeWork', 'food_id', 'product_id'], 'required'],
            [['countAddition', 'countProduct', 'countPortion', 'beforeWork', 'food_id', 'product_id'], 'integer'],
            [['food_id'], 'exist', 'skipOnError' => true, 'targetClass' => Food::class, 'targetAttribute' => ['food_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['beforeWork'], 'exist', 'skipOnError' => true, 'targetClass' => BofereWork::class, 'targetAttribute' => ['beforeWork' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countAddition' => 'Очередь добавления',
            'countProduct' => 'Количество продуктов',
            'countPortion' => 'Количество порций',
            'beforeWork' => 'Продукт нуждается в обработке?',
            'food_id' => 'Food ID',
            'product_id' => 'Product ID',
            'food1' => "Блюдо",
            'product1' => "Продукты",
            'calories' => 'Калории',
        ];
    }

    /**
     * Gets query for [[BeforeWork0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBeforeWork()
    {
        return $this->hasOne(BofereWork::class, ['id' => 'beforeWork']);
    }

    /**
     * Gets query for [[Food]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::class, ['id' => 'food_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

}
