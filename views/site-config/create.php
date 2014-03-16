<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\SiteConfig $model
 */

$this->title = 'Create Site Config';
$this->params['breadcrumbs'][] = ['label' => 'Site Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-config-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
