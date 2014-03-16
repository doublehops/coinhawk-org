<?php

namespace app\models;

/**
 * This is the model class for table "site_config".
 *
 * @property string $id
 * @property integer $send_notifications
 * @property string $created_at
 * @property string $updated_at
 */
class SiteConfig extends BaseModel
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'site_config';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['send_notifications'], 'integer'],
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
			'send_notifications' => 'Send Notifications',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}
}
