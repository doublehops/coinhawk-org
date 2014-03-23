

$( document ).ready(function() {
  loadCharts();
});

function loadCharts() {

  $.each( $('.chart-container'), function(index, value) {
    var chartId = $(this).data('id');
    $.get('?r=/market/fetch-chart-data&id='+ chartId, function(marketData) {
        loadChart(chartId, marketData);
    });
  });
}

function loadChart(chartId,data) {

  var chart = $('#chart-'+ chartId);
  var text = chart.data('market-name');
  var marketName = chart.data('market-name');

  chart.highcharts('StockChart', {
  
    rangeSelector : {
      selected : 1,
      inputEnabled: chart.width() > 480
    },
  
    title : {
      text : text
    },
    
    series : [{
      name : marketName,
      data : data,
      tooltip: {
        valueDecimals: 9
      }
    }]
  });
}
