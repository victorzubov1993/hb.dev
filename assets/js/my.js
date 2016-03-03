/**
 * Created by Olexandr on 14.12.2015.
 */
(function ($) {
    $(function () {
        $(".btn").click(function(){
            $("#toggleSample2").collapse('toggle');
        });
        $('#date').datepicker({
            format: 'yyyy/mm/dd',
            language: "ru",
            autoclose: true,
            todayBtn: "linked"
        });
        $('#date1').datepicker({
            format: 'yyyy/mm/dd',
            language: "ru",
            autoclose: true,
            todayBtn: "linked"
        });        
    })

    $(function () {                  
                   Highcharts.theme = {
                       colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'],
                       chart: {
                           borderWidth: 0,
                           plotBackgroundColor: 'rgba(255, 255, 255, .9)',
                           plotShadow: true,
                           plotBorderWidth: 0
                       },
                       title: {
                           style: {
                               color: '#000',
                               font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
                           }
                       },
                       subtitle: {
                           style: {
                               color: '#666666',
                               font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
                           }
                       },
                       xAxis: {
                           gridLineWidth: 1,
                           lineColor: '#000',
                           tickColor: '#000',
                           labels: {
                               style: {
                                   color: '#000',
                                   font: '11px Trebuchet MS, Verdana, sans-serif'
                               }
                           },
                           title: {
                               style: {
                                   color: '#333',
                                   fontWeight: 'bold',
                                   fontSize: '12px',
                                   fontFamily: 'Trebuchet MS, Verdana, sans-serif'
               
                               }
                           }
                       },
                       yAxis: {
                           minorTickInterval: 'auto',
                           lineColor: '#000',
                           lineWidth: 1,
                           tickWidth: 1,
                           tickColor: '#000',
                           labels: {
                               style: {
                                   color: '#000',
                                   font: '11px Trebuchet MS, Verdana, sans-serif'
                               }
                           },
                           title: {
                               style: {
                                   color: '#333',
                                   fontWeight: 'bold',
                                   fontSize: '12px',
                                   fontFamily: 'Trebuchet MS, Verdana, sans-serif'
                               }
                           }
                       },
                       legend: {
                           itemStyle: {
                               font: '9pt Trebuchet MS, Verdana, sans-serif',
                               color: 'black'
               
                           },
                           itemHoverStyle: {
                               color: '#039'
                           },
                           itemHiddenStyle: {
                               color: 'gray'
                           }
                       },
                       labels: {
                           style: {
                               color: '#99b'
                           }
                       },
               
                       navigation: {
                           buttonOptions: {
                               theme: {
                                   stroke: '#CCCCCC'
                               }
                           }
                       }
                   };
               
               // Apply the theme
                   var highchartsOptions = Highcharts.setOptions(Highcharts.theme);
                   var chartData = [];
                   var name = $('#spend1 td.category').each(function(key, value){
                       chartData.push(new Array($(this).text(), parseInt($(this).next().find('span.whole').text())))
                   });
                   console.log(chartData);
                   var price = $('td span.amount').html();
               
                   $('#chart1').highcharts({
                       chart: {
                           plotBackgroundColor: null,
                           plotBorderWidth: null,
                           plotShadow: true
                       },
                       title: {
                           text: ''
                       },
                       tooltip: {
                           pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                       },
                       plotOptions: {
                           pie: {
                               allowPointSelect: false,
                               cursor: 'pointer',
                               dataLabels: {
                                   enabled: false,
                                   color: '#000000',
                                   connectorColor: '#000000',
                                   format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                               },
                               showInLegend: true
                           }
                       },
                       series: [{
                           type: 'pie',
                           name: 'Процент: ',
                           data: chartData
                       }]
                   });
                   var highchartsOptions = Highcharts.setOptions(Highcharts.theme);
                   var chartData = [];
                   var name = $('#spend td.category').each(function(key, value){
                       chartData.push(new Array($(this).text(), parseInt($(this).next().find('span.whole').text())))
                   });
                   console.log(chartData);
                   var price = $('td span.amount').html();
               
                   $('#chart').highcharts({
                       chart: {
                           plotBackgroundColor: null,
                           plotBorderWidth: null,
                           plotShadow: true
                       },
                       title: {
                           text: ''
                       },
                       tooltip: {
                           pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                       },
                       plotOptions: {
                           pie: {
                               allowPointSelect: false,
                               cursor: 'pointer',
                               dataLabels: {
                                   enabled: false,
                                   color: '#000000',
                                   connectorColor: '#000000',
                                   format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                               },
                               showInLegend: true
                           }
                       },
                       series: [{
                           type: 'pie',
                           name: 'Процент: ',
                           data: chartData
                       }]
                   });
               });

})(jQuery);