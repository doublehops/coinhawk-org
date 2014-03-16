<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\MarketSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="market-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'exchange_id') ?>

		<?= $form->field($model, 'market_id') ?>

		<?= $form->field($model, 'label') ?>

		<?= $form->field($model, 'last_trade_price') ?>

		<?php // echo $form->field($model, 'volume') ?>

		<?php // echo $form->field($model, 'last_trade_time') ?>

		<?php // echo $form->field($model, 'primary_name') ?>

		<?php // echo $form->field($model, 'primary_code') ?>

		<?php // echo $form->field($model, 'secondary_name') ?>

		<?php // echo $form->field($model, 'secondary_code') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
