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
class Market extends BaseModel
{
    // Is there a notification to show for market
    public $notification = false;
    // What class should be shown for notification
    public $notificationClass;

    /**
     * Determine whether market has not been updated for 24 hours
     */
    public function isOldMarket()
    {
        return $this->updated_at < date('Y-m-d H:i:s', time()-86400) ? true : false;
    }

    /**
     * Determine whether market was cread in the last 7 days
     */
    public function isNewMarket()
    {
        return $this->created_at > date('Y-m-d H:i:s', time()-86400*7) ? true : false;
    }

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'market';
	}

    /**
     * Get history data formatted for Highcharts
     *
     * @param integer $marketId market.id
     * @param date $startTime
     * @param date @endTime
     *
     * @return JSON
     */
    public function getHistoryData($marketId, $startTime, $endTime)
    {
        $history = [];

        $records =  (new \yii\db\Query())->select('*')->from('market_history')
            ->where('created_at >= \''. $startTime .'\' AND created_at <= \''. $endTime .'\' AND market_id='. $marketId)
            ->all();

        foreach($records as $record) {

            $history[] = '['. strtotime($record['created_at'])*1000 .','. $record['price'] .']';
        }

        $history = implode(',', $history);
        $history = '['. $history .']';

        return $history;
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
	public function getHistory()
	{
		return $this->hasMany(MarketHistory::className(), ['id' => 'market_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getMarketHistories()
	{
		return $this->hasMany(MarketHistory::className(), ['market_id' => 'id']);
	}

    public function updateData($exchange, $data)
    {
        foreach($data as $market) {

            $model = Market::find()->where(['exchange_id'=>$exchange->id, 
                                            'market_id'=>$market['market_id'],
                                           ]
                                  )->one();

            $newMarket = false;

            if($model == null) {

                $model = new Market;
                $model->exchange_id = $exchange->id;
                $model->market_id = $market['market_id'];
                $model->label = $market['label'];
                $model->primary_name = $market['primary_name'];
                $model->primary_code = $market['primary_code'];
                $model->secondary_name = $market['secondary_name'];
                $model->secondary_code = $market['secondary_code'];

                $newMarket = true;
            }

            $model->last_trade_price = $market['last_trade_price'];
            $model->volume = $market['volume'];
            $model->last_trade_time = $market['last_trade_time'];

            $model->save();

            $siteConfig = SiteConfig::findOne(1);

            if($newMarket && $siteConfig->send_notifications == 1) {
                // @todo: Have this chunk of code working in it's own method
                //$this->sendNewMarketNotification();
                $email = new ScheduledEmailTask;
                $email->addAddresses(['damien@doublehops.com'=>'Damien']);;
                $email->from = 'damien@doublehops.com';
                $email->from_name = 'Coin Hawk';
                $email->subject = $model->exchange->name .' has added new market '. $model->label;
                $email->body = $this->renderPartial('//mail/_newMarket', ['exchange'=>$exchange,'market'=>$model->label], true);
                $email->status = ScheduledEmailTask::STATUS_SCHEDULED;
                $email->scheduled_at = date('Y-m-d H:i:s');
                $email->send();
            }

            $marketHistory = new MarketHistory;
            $marketHistory->market_id = $model->id;
            $marketHistory->price = $model->last_trade_price;
            $marketHistory->save();
        }
    }

    public function sendNewMarketNotification()
    {
        // @todo: move notification code to here
    }

    public function getMarketPage()
    {
        if($this->exchange->name == 'Cryptsy')
            return str_replace('<id>', $this->market_id, $this->exchange->market_page_url);

        if($this->exchange->name == 'Mintpal')
            return str_replace('<id>', $this->label , $this->exchange->market_page_url);
    }
}
