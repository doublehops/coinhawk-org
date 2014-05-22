<?php
use yii\helpers\Html;
$this->title = 'Coin Hawk';
?>
<div class="site-index">

	<div class="text-center">
        <h1>Coin Hawk</h1>
        <h4>(pre-alpha)</h4>
	</div>

    <div class="alert alert-info">
        <p>Note: CoinHawk checks each exchange every five minutes and records the last price of each market. It's important to realise that it does not record all data that happens in each five minute period. Therefore it may not be a true reflection on what's happening in the markets but more of an indication.</p>
    </div>

	<div class="body-content">

        <div class="row">
            <div class="col-sm-6">
                <h3>Site Index</h3>
                <ul>
                    <li><?= Html::a('Market Listing/Search', \Yii::$app->getUrlManager()->createUrl('/market/index')) ?></li>
                </ul>
                <ul>
                    <li><?= Html::a('Cryptsy Full Chart Listing - <strong>last 24 hours</strong> (CPU intensive)', \Yii::$app->getUrlManager()->createUrl(['/market/full-listing', 'id' => 1,'period'=>'last24Hours'])) ?></li>
                    <li><?= Html::a('Cryptsy Full Chart Listing - <strong>last 7 days</strong> (CPU intensive)', \Yii::$app->getUrlManager()->createUrl(['/market/full-listing', 'id' => 1,'period'=>'last7Days'])) ?></li>
                </ul>
                <ul>
                    <li><?= Html::a('Mintpal Full Chart Listing - <strong>last 24 hours</strong> (CPU intensive)', \Yii::$app->getUrlManager()->createUrl(['/market/full-listing', 'id' => 2,'period'=>'last24Hours'])) ?></li>
                    <li><?= Html::a('Mintpal Full Chart Listing - <strong>last 7 days</strong> (CPU intensive)', \Yii::$app->getUrlManager()->createUrl(['/market/full-listing', 'id' => 2,'period'=>'last7Days'])) ?></li>
                </ul>
                <hr />
                <ul>
                    <li><?= Html::a('LTC/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 99])) ?></li>
                    <li><?= Html::a('RDD/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 149])) ?></li>
                    <li><?= Html::a('DOGE/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 73])) ?></li>
                    <li><?= Html::a('DRK/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 74])) ?></li>
                    <li><?= Html::a('BC/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 162])) ?></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <h3>Sites of interest</h3>
                <ul>
                    <li><a href="https://bitcoinwisdom.com/" target="_blank">Bitcoin Wisdom</a></li>
                    <li><a href="http://www.coingecko.com/" target="_blank">CoinGecko (Crypto prospectus)</a></li>
                    <li><a href="https://coinmarketcap.com/" target="_blank">Coin Market Cap</a></li>
                </ul>
            </div>
	</div>
</div>
