<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property string|null $description
 * @property float|null $income
 * @property int|null $number_of_dependants
 * @property string $created_at
 * @property string $updated_at
 */
class Application extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
//Mansoor - 15-3-25 - table columns with required validation
        return [
            [['description', 'income', 'number_of_dependants'], 'default', 'value' => null],
            [['first_name', 'last_name', 'date_of_birth'], 'required'],
            [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'], 
            [['description'], 'string'],
            [['income'], 'number'], 
            [['number_of_dependants'], 'integer'], 
            [['created_at', 'updated_at'], 'safe'], 
            [['first_name', 'last_name'], 'string', 'max' => 255],
        ];
    }
     /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'date_of_birth' => 'Date Of Birth',
            'description' => 'Description',
            'income' => 'Income',
            'number_of_dependants' => 'Number Of Dependants',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
