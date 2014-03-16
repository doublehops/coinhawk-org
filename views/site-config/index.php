<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\SiteConfigSearch $searchModel
 */

$this->title = 'Site Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-config-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Site Config', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'send_notifications',
			'created_at',
			'updated_at',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
