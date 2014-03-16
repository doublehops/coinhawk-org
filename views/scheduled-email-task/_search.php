<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search\ScheduledEmailTask $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="scheduled-email-task-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'to') ?>

		<?= $form->field($model, 'to_name') ?>

		<?= $form->field($model, 'from') ?>

		<?= $form->field($model, 'from_name') ?>

		<?php // echo $form->field($model, 'subject') ?>

		<?php // echo $form->field($model, 'body') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'scheduled_at') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
