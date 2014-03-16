<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Market $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="market-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'exchange_id')->textInput(['maxlength' => 10]) ?>

		<?= $form->field($model, 'market_id')->textInput(['maxlength' => 10]) ?>

		<?= $form->field($model, 'label')->textInput(['maxlength' => 20]) ?>

		<?= $form->field($model, 'last_trade_price')->textInput(['maxlength' => 25]) ?>

		<?= $form->field($model, 'volume')->textInput(['maxlength' => 25]) ?>

		<?= $form->field($model, 'last_trade_time')->textInput() ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<?= $form->field($model, 'primary_name')->textInput(['maxlength' => 50]) ?>

		<?= $form->field($model, 'secondary_name')->textInput(['maxlength' => 50]) ?>

		<?= $form->field($model, 'primary_code')->textInput(['maxlength' => 10]) ?>

		<?= $form->field($model, 'secondary_code')->textInput(['maxlength' => 10]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
