<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Market;

/**
 * MarketSearch represents the model behind the search form about `app\models\Market`.
 */
class MarketSearch extends Model
{
	public $id;
	public $exchange_id;
	public $market_id;
	public $label;
	public $last_trade_price;
	public $volume;
	public $last_trade_time;
	public $primary_name;
	public $primary_code;
	public $secondary_name;
	public $secondary_code;
	public $created_at;
	public $updated_at;

	public function rules()
	{
		return [
			[['id', 'exchange_id', 'market_id'], 'integer'],
			[['label', 'last_trade_time', 'primary_name', 'primary_code', 'secondary_name', 'secondary_code', 'created_at', 'updated_at'], 'safe'],
			[['last_trade_price', 'volume'], 'number'],
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

	public function search($params)
	{
		$query = Market::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'exchange_id');
		$this->addCondition($query, 'market_id');
		$this->addCondition($query, 'label', true);
		$this->addCondition($query, 'last_trade_price');
		$this->addCondition($query, 'volume');
		$this->addCondition($query, 'last_trade_time');
		$this->addCondition($query, 'primary_name', true);
		$this->addCondition($query, 'primary_code', true);
		$this->addCondition($query, 'secondary_name', true);
		$this->addCondition($query, 'secondary_code', true);
		$this->addCondition($query, 'created_at');
		$this->addCondition($query, 'updated_at');
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		if (($pos = strrpos($attribute, '.')) !== false) {
			$modelAttribute = substr($attribute, $pos + 1);
		} else {
			$modelAttribute = $attribute;
		}

		$value = $this->$modelAttribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
