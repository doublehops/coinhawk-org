

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

  var text = $('.chart-container').data('market-name');
  var marketName = $('.chart-container').data('market-name');

  $('#chart-'+ chartId).highcharts('StockChart', {
  
    rangeSelector : {
      selected : 1,
      inputEnabled: $('chart-'+ chartId).width() > 480
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
