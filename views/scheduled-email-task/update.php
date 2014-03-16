<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ScheduledEmailTask $model
 */

$this->title = 'Update Scheduled Email Task: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Scheduled Email Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scheduled-email-task-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
