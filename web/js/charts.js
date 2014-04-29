

$( document ).ready(function() {
  loadCharts();
});

function loadCharts() {

  $.each( $('.chart-container'), function(index, value) {
    var chartId = $(this).data('id');
    var time = $(this).data('time');
    $.get('/market/fetch-chart-data?id='+ chartId +'&time='+ time, function(marketData) {
        loadChart(chartId, marketData);
    });
  });
}

function loadChart(chartId,data) {

  var chart = $('#chart-'+ chartId);
  var text = chart.data('market-name');
  var marketName = chart.data('market-name');

  chart.parent().find('.mask').removeClass('mask');

  Highcharts.setOptions({
    global : {
      useUTC : false,
    }
  });

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
