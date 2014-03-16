<?php

namespace app\models;

/**
 * This is the model class for table "scheduled_email_task".
 *
 * @property string $id
 * @property string $to
 * @property string $to_name
 * @property string $from
 * @property string $from_name
 * @property string $subject
 * @property string $body
 * @property string $status
 * @property string $scheduled_at
 * @property string $created_at
 * @property string $updated_at
 */
class ScheduledEmailTask extends BaseModel
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'scheduled_email_task';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['to', 'to_name', 'from', 'from_name', 'subject', 'body', 'status'], 'required'],
			[['body', 'status'], 'string'],
			[['scheduled_at', 'created_at', 'updated_at'], 'safe'],
			[['to', 'to_name', 'from', 'from_name', 'subject'], 'string', 'max' => 255]
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
}
