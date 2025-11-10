<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "BofereWork".
 *
 * @property int $id
 * @property int $work
 * @property string $alais
 */
class BofereWork extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'BofereWork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['work', 'alais'], 'required'],
            [['work'], 'integer'],
            [['alais'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work' => 'Work',
            'alais' => 'Alais',
        ];
    }

}
