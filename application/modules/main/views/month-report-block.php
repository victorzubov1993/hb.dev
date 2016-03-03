<div class="container">
   <a href="http://hb.dev/main/report/month/?year=<?=$iPrevYear.'&month='.$iPrevMonth;?>">Предыдущий</a>
   <a href="http://hb.dev/main/report/month/?year=<?=$iNextYear.'&month='.$iNextMonth;?>">Следующий</a>
   <h3 class="text-info">Отчет <small>за <?php echo $month.' '.date("Y");?></small></h3>
   <div class="row">
      <div class="col-sm-6">
         <table class="table" id="spend1">
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
         <div class="container">
            <div id="chart1" style="width: 300px; height: 220px"></div>            
         </div>
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
         <script src="http://code.highcharts.com/highcharts.js"></script>
         <div class="container">
            <div id="chart" style="width: 300px; height: 220px"></div>            
         </div>
      </div>
   </div>
</div>