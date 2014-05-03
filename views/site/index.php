<?php
use yii\helpers\Html;
$this->title = 'Coin Hawk';
?>
<div class="site-index">

	<div class="jumbotron">
        <h1>Coin Hawk</h1>
	</div>

	<div class="body-content">

        <div class="row">
            <div class="col-sm-6">
                <h2>Site Index</h2>
                <ul>
                    <li><?= Html::a('Cryptsy Markets', \Yii::$app->getUrlManager()->createUrl('/market/index')) ?></li>
                    <li><?= Html::a('Cryptsy Full Chart Listing (CPU intensive)', \Yii::$app->getUrlManager()->createUrl(['/market/full-listing', 'id' => 1])) ?></li>
                    <li><hr /></li>
                    <li><?= Html::a('LTC/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 99])) ?></li>
                    <li><?= Html::a('RDD/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 149])) ?></li>
                    <li><?= Html::a('DOGE/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 73])) ?></li>
                    <li><?= Html::a('DRK/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 74])) ?></li>
                    <li><?= Html::a('BC/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 162])) ?></li>
                </ul>
            </div>
            <div class="col-sm-6">
                <h2>Sites of interest</h2>
                <ul>
                    <li><a href="https://bitcoinwisdom.com/" target="_blank">Bitcoin Wisdom</a></li>
                    <li><a href="http://www.coingecko.com/" target="_blank">CoinGecko (Crypto prospectus)</a></li>
                    <li><a href="https://coinmarketcap.com/" target="_blank">Coin Market Cap</a></li>
                </ul>
            </div>
	</div>
</div>
