<?php

namespace app\models;

use app\models\EmailRecipient;

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
    CONST STATUS_IDLE      = 'idle';
    CONST STATUS_SCHEDULED = 'scheduled';
    CONST STATUS_COMPLETED = 'completed';
    CONST STATUS_CANCELLED = 'cancelled';

    protected $addresses;

    /**
     * Add addresses
     *
     * @param array Values can either be key=>value ('email'=>'name') or
     *  just email
     *  
     *  eg. $address = array('john@domain.com'=>'john', 'bob@domain.com');
     */
    public function addAddresses(array $addresses)
    {
        foreach($addresses as $address => $name) {
            // Check if $address is an email or int key
            if(is_int($address)) {
                if(!filter_var($name, FILTER_VALIDATE_EMAIL))
                    die('Not a valid email address');

                $this->addresses[$name] = $name;
            } else {
                if(!filter_var($address, FILTER_VALIDATE_EMAIL))
                    throw new Exception(500, 'Not a valid email address');

                    $this->addresses[$address] = $name;
            }
        }
    }

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
			[['from', 'from_name', 'subject', 'body', 'status'], 'required'],
			[['body', 'status'], 'string'],
			[['scheduled_at'], 'safe'],
			[['from', 'from_name', 'subject'], 'string', 'max' => 255]
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

    public function send()
    {
        $this->save();
        $this->saveRecipients();

        $this->status = self::STATUS_SCHEDULED;
        $this->save();
    }

    public function saveRecipients()
    {
        foreach($this->addresses as $address => $name) {

            $recipient = new EmailRecipient();
            $recipient->email_id = $this->id;
            $recipient->email = $address;
            $recipient->name = $name;
            $recipient->save();
        }
    }

    public function getRecipients()
    {
        return $this->hasMany(EmailRecipient::className(), ['email_id' => 'id']);
    }
}
