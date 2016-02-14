<?php setlocale (LC_TIME, 'ru_RU');?>
<div class="container">
   <a href="http://hb.dev/main/report/month/?r=<?=$iPrevMonth.'-'.$iPrevYear;?>">Предыдущий</a>
   <a href="http://hb.dev/main/report/month/?r=<?=$iNextMonth.'-'.$iNextYear;?>">Следующий</a>
   <h3 class="text-info">Отчет <small><?=$month;?></small><small><?=$iYear;?></small></h3>
   
   <div class="row">
      <div class="col-sm-6">
         <table class="table">
            <tbody>
               <tr>
                  <th>Доходы</th>
                  <th class="text-right">Сумма</th>
               </tr>
               <tr class="category-row">
                  <td class="category_name">Зарплата</td>
                  <td class="text-right"><span class="amount"><span class="text-success">&nbsp;+&nbsp;<span class="whole">48231</span><span class="text-muted">.00</span>&nbsp;<span class="text-muted small">&nbsp;грн. </span></span></span></td>
               </tr>
            </tbody>
            <tfoot>
               <tr>
                  <td class="text-right" colspan="2"><strong>Итого: <span class="text-success">&nbsp;+&nbsp;<span class="whole">48231</span><span class="text-muted">.00</span>&nbsp;<span class="text-muted small">&nbsp;грн. </span></span></strong></td>
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

