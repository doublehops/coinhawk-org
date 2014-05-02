<?php
use yii\helpers\Html;
$this->title = 'Coin Hawk';
?>
<div class="site-index">

	<div class="jumbotron">
        <h1>Coin Hawk</h1>
	</div>

	<div class="body-content">

        <h2>Site Index</h2>
        <ul>
            <li><?= Html::a('Cryptsy Markets', \Yii::$app->getUrlManager()->createUrl('/market/index')) ?></li>
            <li><?= Html::a('Cryptsy Full Chart Listing (CPU intensive)', \Yii::$app->getUrlManager()->createUrl(['/market/full-listing', 'id' => 1])) ?></li>
            <li>---------------------------------------------------------------------------------------------------------</li>
            <li><?= Html::a('LTC/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 99])) ?></li>
            <li><?= Html::a('RDD/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 149])) ?></li>
            <li><?= Html::a('DOGE/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 73])) ?></li>
            <li><?= Html::a('DRK/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 74])) ?></li>
            <li><?= Html::a('BC/BTC', \Yii::$app->getUrlManager()->createUrl(['/market/view', 'id' => 162])) ?></li>
        </ul>

	</div>
</div>
