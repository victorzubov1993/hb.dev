<div class="container">
   <a href="http://hb.dev/main/report/month/?year=<?=$iPrevYear.'&month='.$iPrevMonth;?>">Предыдущий</a>
   <a href="http://hb.dev/main/report/month/?year=<?=$iNextYear.'&month='.$iNextMonth;?>">Следующий</a>
   <h3 class="text-info">Отчет <small>за <?php echo $month.' '.$_GET['year'];?></small></h3>
   <div class="row">
      <div class="col-sm-6">
         <table class="table">
            <tbody>
               <h3>Доходы</h3>
               <tr>
                  <th>Дата</th>
                  <th>Счет</th>
                  <th>Категория</th>
                  <th class="text-right">Сумма</th>
               </tr>
               <? for($i = 0; $i <count($m_report_inc); ++$i) :?>
               <tr class="category-row">
                  <td class="date"><?=$m_report_inc[$i]->date;?></td>
                  <td class="account"><?=$m_report_inc[$i]->title;?></td>
                  <td class="category"><?=$m_report_inc[$i]->title_categor;?></td>
                  <td class="text-right" colspan="4"><span class="amount"><span class="text-success">&nbsp;+&nbsp;<span class="whole"><?=$m_report_inc[$i]->sum;?></span><span class="text-muted small">&nbsp;грн. </span></span></span></td>
               </tr>
               <? endfor;?>
            </tbody>
            <tfoot>
               <tr>
                  <td class="text-right" colspan="4"><strong>Итого: <span class="text-success">&nbsp;+&nbsp;<span class="whole"></span><?=$sum_m_inc[0]['SUM(sum)'];?><span class="text-muted small">&nbsp;грн. </span></span></strong></td>
               </tr>
            </tfoot>
         </table>
      </div>
      <div class="col-sm-6">
         <table class="table" id="spend">
            <tbody>
               <h3>Расходы</h3>
               <tr>
                  <th>Дата</th>
                  <th>Счет</th>
                  <th>Категория</th>
                  <th class="text-right">Сумма</th>
               </tr>
               <? for($i = 0; $i <count($m_report_exp); ++$i) :?>
               <tr class="category-row">
                  <td class="date"><?=$m_report_exp[$i]->date;?></td>
                  <td class="account"><?=$m_report_exp[$i]->title;?></td>
                  <td class="category"><?=$m_report_exp[$i]->title_categor;?></td>
                  <td class="text-right" colspan="4"><span class="amount"><span class="text-success">&nbsp;-&nbsp;<span class="whole"><?=$m_report_exp[$i]->sum;?></span><span class="text-muted small">&nbsp;грн. </span></span></span></td>
               </tr>
               <? endfor;?>
            </tbody>
            <tfoot>
               <tr>
                  <td class="text-right" colspan="4"><strong>Итого: <span class="text-success">&nbsp;-&nbsp;<span class="whole"></span><?=$sum_m_exp[0]['SUM(sum)'];?><span class="text-muted small">&nbsp;грн. </span></span></strong></td>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>
<script src="http://code.highcharts.com/highcharts.js"></script>
<div class="container">
   <div id="chart" style="width: 300px; height: 200px"></div>
   <script>
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
          var name = $('#spend td.category').each(function(key, value){
              chartData.push(new Array($(this).text(), parseInt($(this).next().find('span.whole').text())))
          });
          console.log(chartData);
          var price = $('td span.amount').html();
      
          $('#chart').highcharts({
              chart: {
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false
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
      
      
   </script>
</div>