<?php use yii\helpers\Html; ?>
<div class="market-container">
    <div class="mask"></div>
    <h3><?= Html::a($market->primary_name .' / '. $market->secondary_name, array('market/view', 'id'=>$market->id)) ?></h3>
    <div id="chart-<?= $market->id ?>" class="chart-container" style="width:100%; height:350px;" data-market-name="<?= $market->label ?>" data-id="<?= $market->id ?>" data-time="last30Days"></div>
</div>
