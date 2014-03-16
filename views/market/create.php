<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Market $model
 */

$this->title = 'Create Market';
$this->params['breadcrumbs'][] = ['label' => 'Markets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="market-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
