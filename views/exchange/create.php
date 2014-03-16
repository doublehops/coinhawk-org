<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Exchange $model
 */

$this->title = 'Create Exchange';
$this->params['breadcrumbs'][] = ['label' => 'Exchanges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exchange-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
