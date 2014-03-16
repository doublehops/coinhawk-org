<?php

namespace app\models;

/**
 * This is the model class for table "market".
 *
 * @property string $id
 * @property string $exchange_id
 * @property string $market_id
 * @property string $label
 * @property string $last_trade_price
 * @property string $volume
 * @property string $last_trade_time
 * @property string $primary_name
 * @property string $primary_code
 * @property string $secondary_name
 * @property string $secondary_code
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Exchange $exchange
 * @property MarketHistory[] $marketHistories
 */
class Market extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'market';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['exchange_id', 'market_id', 'label', 'last_trade_price', 'volume'], 'required'],
			[['exchange_id', 'market_id'], 'integer'],
			[['last_trade_price', 'volume'], 'number'],
			[['last_trade_time', 'created_at', 'updated_at'], 'safe'],
			[['label'], 'string', 'max' => 20],
			[['primary_name', 'secondary_name'], 'string', 'max' => 50],
			[['primary_code', 'secondary_code'], 'string', 'max' => 10]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'exchange_id' => 'Exchange ID',
			'market_id' => 'Market ID',
			'label' => 'Label',
			'last_trade_price' => 'Last Trade Price',
			'volume' => 'Volume',
			'last_trade_time' => 'Last Trade Time',
			'primary_name' => 'Primary Name',
			'primary_code' => 'Primary Code',
			'secondary_name' => 'Secondary Name',
			'secondary_code' => 'Secondary Code',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getExchange()
	{
		return $this->hasOne(Exchange::className(), ['id' => 'exchange_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getMarketHistories()
	{
		return $this->hasMany(MarketHistory::className(), ['market_id' => 'id']);
	}
}
