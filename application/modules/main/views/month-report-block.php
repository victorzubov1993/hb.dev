
<div class="container">
   <a href="http://hb.dev/main/report/month/?year=<?=$iPrevYear.'&month='.$iPrevMonth;?>">Предыдущий</a>
   <a href="http://hb.dev/main/report/month/?year=<?=$iNextYear.'&month='.$iNextMonth;?>">Следующий</a>
   <!-- <h3 class="text-info">Отчет <small><?=$iMonth;?></small><small><?=' '.$iYear;?></small></h3> -->
   <!-- <h4><?=var_dump($m_report);?>
      <h4><?=var_dump($_GET['month']);?> -->
   <div class="row">
      <div class="col-sm-6">
         <table class="table">
            <tbody>
               <tr>
                  <th>Дата</th>
                  <th>Счет</th>
                  <th>Категория</th>
                  <th class="text-right">Сумма</th>
               </tr>
               <? for($i = 0; $i <count($m_report); ++$i) :?>
               <tr class="category-row">
                  <td class="date"><?=$m_report[$i]->date;?></td>
                  <td class="account"><?=$m_report[$i]->title;?></td>
                  <td class="category"><?=$m_report[$i]->title_categor;?></td>
                  <td class="text-right" colspan="4"><span class="amount"><span class="text-success">&nbsp;-&nbsp;<span class="whole"><?=$m_report[$i]->sum;?></span><span class="text-muted">.00</span>&nbsp;<span class="text-muted small">&nbsp;грн. </span></span></span></td>
               </tr>
               <? endfor;?>
            </tbody>
            <tfoot>
               <tr>
                  <td class="text-right" colspan="4"><strong>Итого: <span class="text-success">&nbsp;-&nbsp;<span class="whole"></span><?=$sum_m[0]['SUM(sum)'];?><span class="text-muted">.00</span>&nbsp;<span class="text-muted small">&nbsp;грн. </span></span></strong></td>
               </tr>
            </tfoot>
         </table>
      </div>
      <div class="col-sm-6">
         <table class="table" id="spend">
            <tbody>
               <tr>
                  <th>Расходы</th>
                  <th class="text-right">Сумма</th>
               </tr>
               <tr class="category-row">
                  <td class="category_name">Медицина</td>
                  <td class="text-right">
                     <span class="amount"><span class="text-danger">&nbsp;−&nbsp;<span class="whole">23495</span><span class="text-muted">.00</span>&nbsp;<span class="text-muted small">&nbsp;грн. </span></span></span>
                  </td>
               </tr>
               <tr class="category-row">
                  <td class="category_name">Продукты</td>
                  <td class="text-right">
                     <span class="amount"><span class="text-danger">&nbsp;−&nbsp;<span class="whole">1628</span><span class="text-muted">.00</span>&nbsp;<span class="text-muted small">&nbsp;грн. </span></span></span>
                  </td>
               </tr>
            </tbody>
            <tfoot>
               <tr>
                  <td class="text-right" colspan="2"><strong>Итого: <span class="text-danger">&nbsp;−&nbsp;<span class="whole">25123</span><span class="text-muted">.00</span>&nbsp;<span class="text-muted small">&nbsp;грн. </span></span></strong></td>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>

