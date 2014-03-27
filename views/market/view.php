<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Market $model
 */

$this->title = $model->label .' - '. $model->primary_name .' / '. $model->secondary_name;
$this->params['breadcrumbs'][] = ['label' => 'Markets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-view">

    <?= $this->render('_chart', ['market'=>$model]); ?>

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
				'method' => 'post',
			],
		]) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'exchange_id',
			'market_id',
			'label',
			'last_trade_price',
			'volume',
			'last_trade_time',
			'primary_name',
			'primary_code',
			'secondary_name',
			'secondary_code',
			'created_at',
			'updated_at',
		],
	]) ?>

</div>
