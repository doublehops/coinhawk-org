<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\ScheduledEmailTask $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="scheduled-email-task-form">

	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'to')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'to_name')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'from')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'from_name')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'subject')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<?= $form->field($model, 'scheduled_at')->textInput() ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
