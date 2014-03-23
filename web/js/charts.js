
console.log('charts loading aaa');

//var data = [5, 7, 3, 6, 6, 2, 8, 9, 1];
var data = $('#chart-container').data('history');
console.log(data);

        $('#chart-container').highcharts('StockChart', {
            

            rangeSelector : {
                selected : 1,
                inputEnabled: $('#chart-container').width() > 480
            },

            title : {
                text : 'AAPL Stock Price'
            },
            
            series : [{
                name : 'AAPL',
                data : data,
                tooltip: {
                    valueDecimals: 2
                }
            }]
        });
