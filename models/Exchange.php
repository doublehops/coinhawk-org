<?php

namespace app\models;

/**
 * This is the model class for table "exchange".
 *
 * @property string $id
 * @property string $name
 * @property string $component
 * @property string $url
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Market[] $markets
 */
class Exchange extends BaseModel
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'exchange';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name', 'component'], 'required'],
			[['created_at', 'updated_at'], 'safe'],
			[['name'], 'string', 'max' => 25],
			[['component', 'url'], 'string', 'max' => 100]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'component' => 'Component',
			'url' => 'Url',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getMarkets()
	{
		return $this->hasMany(Market::className(), ['exchange_id' => 'id']);
	}
}
