<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Exchange $model
 */

$this->title = 'Update Exchange: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Exchanges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exchange-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
