<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\ScheduledEmailTask $model
 */

$this->title = 'Create Scheduled Email Task';
$this->params['breadcrumbs'][] = ['label' => 'Scheduled Email Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheduled-email-task-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
