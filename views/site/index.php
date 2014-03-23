<?php
use yii\helpers\Html;
$this->title = 'Coin Hawk';
?>
<div class="site-index">

	<div class="jumbotron">
        <h1>Coin Hawk</h1>
	</div>

	<div class="body-content">

        <?= Html::a('Cryptsy Full Listing', \Yii::$app->getUrlManager()->createUrl(['/market/full-listing', 'id' => 1])) ?>

	</div>
</div>
