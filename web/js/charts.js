
console.log('charts loading aaa');

var data = $('.chart-container').data('history');
var text = $('.chart-container').data('market-name');
var marketName = $('#chart-container').data('market-name');

        $('.chart-container').highcharts('StockChart', {
            

            rangeSelector : {
                selected : 1,
                inputEnabled: $('.chart-container').width() > 480
            },

            title : {
                text : text
            },
            
            series : [{
                name : marketName,
                data : data,
                tooltip: {
                    valueDecimals: 2
                }
            }]
        });
