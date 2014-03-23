<div class="market-container">
    <div class="mask"></div>
    <h3><?= $market->primary_name ?> / <?= $market->secondary_name ?></h3>
    <div id="chart-<?= $market->id ?>" class="chart-container" style="width:100%; height:350px;" data-market-name="<?= $market->label ?>" data-id="<?= $market->id ?>" data-time="last7Days"></div>
</div>
