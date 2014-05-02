<?php 
use yii\helpers\Html;
use app\components\ChartHelper;
?>
<div class="market-container container-mask" id="market-<?= $market->id ?>" data-market-name="<?= $market->label ?>" data-id="<?= $market->id ?>">
    <div class="mask"></div>
    <div class="chart-inputs">
        <?= ChartHelper::chartInput('chart', $period, 'TimePeriods', $market->id); ?>
    </div>
    <h3><?= Html::a($market->primary_name .' / '. $market->secondary_name, array('market/view', 'id'=>$market->id)) ?>
        <?php if($market->isNewMarket()) : ?><span class="pull-right market-new">New Market</span><?php endif ?>
        <?php if($market->isOldMarket()) : ?><span class="pull-right market-old">Dead Market</span><?php endif ?>
    </h3>
    <div id="chart-<?= $market->id ?>" class="chart-container" style="width:100%; height:350px;"></div>
</div>
