<?php

namespace app\models;

/**
 * This is the model class for table "email_recipient".
 *
 * @property string $id
 * @property string $email_id
 * @property string $email
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class EmailRecipient extends BaseModel
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'email_recipient';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['email_id', 'email', 'name'], 'required'],
			[['email_id'], 'integer'],
			[['created_at', 'updated_at'], 'safe'],
			[['email', 'name'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'email_id' => 'Email ID',
			'email' => 'Email',
			'name' => 'Name',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		];
	}
}
