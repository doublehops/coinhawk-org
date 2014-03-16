<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\MarketSearch $searchModel
 */

$this->title = 'Markets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Market', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'exchange_id',
			'market_id',
			'label',
			'last_trade_price',
			// 'volume',
			// 'last_trade_time',
			// 'primary_name',
			// 'primary_code',
			// 'secondary_name',
			// 'secondary_code',
			// 'created_at',
			// 'updated_at',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
