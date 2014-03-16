<?php

namespace app\models;

/**
 * This is the model class for table "market_history".
 *
 * @property string $id
 * @property string $market_id
 * @property string $price
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Market $market
 */
class MarketHistory extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'market_history';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['market_id', 'price'], 'required'],
			[['market_id'], 'integer'],
			[['price'], 'number'],
			[['created_at', 'updated_at'], 'safe']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'market_id' => 'Market ID',
			'price' => 'Price',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getMarket()
	{
		return $this->hasOne(Market::className(), ['id' => 'market_id']);
	}
}
