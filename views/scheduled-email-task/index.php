<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\ScheduledEmailTask $searchModel
 */

$this->title = 'Scheduled Email Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheduled-email-task-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Scheduled Email Task', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'to',
			'to_name',
			'from',
			'from_name',
			// 'subject',
			// 'body:ntext',
			// 'status',
			// 'scheduled_at',
			// 'created_at',
			// 'updated_at',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
