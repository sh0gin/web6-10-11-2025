<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\composition;

/**
 * compositionSearch represents the model behind the search form of `app\models\composition`.
 */
class compositionSearch extends composition
{


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'countAddition', 'countProduct', 'countPortion', 'beforeWork', 'food_id', 'product_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = composition::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'countAddition' => $this->countAddition,
            'countProduct' => $this->countProduct,
            'countPortion' => $this->countPortion,
            'beforeWork' => $this->beforeWork,
            'food_id' => $this->food_id,
            'product_id' => $this->product_id,
        ]);

        return $dataProvider;
    }

    public function searchFirst($params, $formName = null)
    {
        $query = composition::find()
            ->select([
                'food.name as food1',
                'product.name as product1'
            ])
            ->innerJoin('food', 'food_id = food.id')
            ->innerJoin('product', 'product_id = product.id')
            ->innerJoin('categoryProduct', 'product.category_id = categoryProduct.id')
            ->where(['category' => 'Овощи', 'beforeWork' => 2]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'countAddition' => $this->countAddition,
            'countProduct' => $this->countProduct,
            'countPortion' => $this->countPortion,
            'beforeWork' => $this->beforeWork,
            'food_id' => $this->food_id,
            'product_id' => $this->product_id,
        ]);

        return $dataProvider;
    }

    public function exFirst()
    {
        $query = composition::find()
            ->select([
                'food.name as food1',
                'product.name as product1'
            ])
            ->innerJoin('food', 'food_id = food.id')
            ->innerJoin('product', 'product_id = product.id')
            ->innerJoin('categoryProduct', 'product.category_id = categoryProduct.id')
            ->where(['category' => 'Овощи', 'beforeWork' => 2]);

        return $query->asArray()->all();
    }

    public function searchSecond($params, $formName = null)
    {
        $query = composition::find()
            ->select([
                'food.name as food1',
                'ROUND(sum(calories * (countProduct / unitsOfMeasurement) / countPortion), 1) as calories'
            ])
            ->innerJoin('food', 'food_id = food.id')
            ->innerJoin('product', 'product_id = product.id')
            ->innerJoin('categoryProduct', 'product.category_id = categoryProduct.id')
            ->innerJoin('category', 'food.category_id = category.id')
            ->groupBy("food.name");

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'countAddition' => $this->countAddition,
            'countProduct' => $this->countProduct,
            'countPortion' => $this->countPortion,
            'beforeWork' => $this->beforeWork,
            'food_id' => $this->food_id,
            'product_id' => $this->product_id,
        ]);

        return $dataProvider;
    }

    public function exSecond()
    {
        $query = composition::find()
            ->select([
                'food.name as food1',
                'ROUND(sum(calories * (countProduct / unitsOfMeasurement) / countPortion), 1) as calories'
            ])
            ->innerJoin('food', 'food_id = food.id')
            ->innerJoin('product', 'product_id = product.id')
            ->innerJoin('categoryProduct', 'product.category_id = categoryProduct.id')
            ->innerJoin('category', 'food.category_id = category.id')
            ->groupBy("food.name");


        return $query->asArray()->all();
    }

    public function searchThird($params, $formName = null)
    {
        $query = composition::find()
            ->select([
                'food.name as food1',
                'SUM(countProduct) as count'
            ])
            ->innerJoin('food', 'food_id = food.id')
            ->innerJoin('product', 'product_id = product.id')
            ->innerJoin('categoryProduct', 'product.category_id = categoryProduct.id')
            ->groupBy("food.name")
            ->limit(1)
            ->orderBy(["count" => SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'countAddition' => $this->countAddition,
            'countProduct' => $this->countProduct,
            'countPortion' => $this->countPortion,
            'beforeWork' => $this->beforeWork,
            'food_id' => $this->food_id,
            'product_id' => $this->product_id,
        ]);

        return $dataProvider;
    }

    public function exThird()
    {
        $query = composition::find()
            ->select([
                'food.name as food1',
                'SUM(countProduct) as count'
            ])
            ->innerJoin('food', 'food_id = food.id')
            ->innerJoin('product', 'product_id = product.id')
            ->innerJoin('categoryProduct', 'product.category_id = categoryProduct.id')
            ->groupBy("food.name")
            ->orderBy(["SUM('countProduct')" => SORT_DESC])
            ->limit(1);



        return $query->asArray()->all();
    }

    public function searchFourth($params, $formName = null)
    {
        $query = composition::find()
            ->select([
                'food.name as food1',
                'countAddition'
            ])
            ->innerJoin('food', 'food_id = food.id')
            ->innerJoin('product', 'product_id = product.id')
            ->innerJoin('category', 'food.category_id = category.id')
            ->where(['category.category' => 'первое блюдо'])
            ->orderBy(["food1" => SORT_ASC, 'countAddition' => SORT_ASC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'countAddition' => $this->countAddition,
            'countProduct' => $this->countProduct,
            'countPortion' => $this->countPortion,
            'beforeWork' => $this->beforeWork,
            'food_id' => $this->food_id,
            'product_id' => $this->product_id,
        ]);

        return $dataProvider;
    }

    public function exFourth()
    {
        $query = composition::find()
            ->select([
                'food.name as food1',
                'countAddition as count'
            ])
            ->innerJoin('food', 'food_id = food.id')
            ->innerJoin('product', 'product_id = product.id')
            ->innerJoin('category', 'food.category_id = category.id')
            ->where(['category.category' => 'первое блюдо'])
            ->orderBy(["food1" => SORT_ASC, 'countAddition' => SORT_ASC]);



        return $query->asArray()->all();
    }
}
