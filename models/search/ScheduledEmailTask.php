<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ScheduledEmailTask as ScheduledEmailTaskModel;

/**
 * ScheduledEmailTask represents the model behind the search form about `app\models\ScheduledEmailTask`.
 */
class ScheduledEmailTask extends Model
{
	public $id;
	public $to;
	public $to_name;
	public $from;
	public $from_name;
	public $subject;
	public $body;
	public $status;
	public $scheduled_at;
	public $created_at;
	public $updated_at;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['to', 'to_name', 'from', 'from_name', 'subject', 'body', 'status', 'scheduled_at', 'created_at', 'updated_at'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'to' => 'To',
			'to_name' => 'To Name',
			'from' => 'From',
			'from_name' => 'From Name',
			'subject' => 'Subject',
			'body' => 'Body',
			'status' => 'Status',
			'scheduled_at' => 'Scheduled At',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}

	public function search($params)
	{
		$query = ScheduledEmailTaskModel::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'to', true);
		$this->addCondition($query, 'to_name', true);
		$this->addCondition($query, 'from', true);
		$this->addCondition($query, 'from_name', true);
		$this->addCondition($query, 'subject', true);
		$this->addCondition($query, 'body', true);
		$this->addCondition($query, 'status', true);
		$this->addCondition($query, 'scheduled_at');
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
