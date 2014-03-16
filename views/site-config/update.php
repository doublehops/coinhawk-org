<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SiteConfig $model
 */

$this->title = 'Update Site Config: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Site Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-config-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
