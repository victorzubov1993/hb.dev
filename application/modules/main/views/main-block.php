<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
   <div class="page-header pull-left">
      <div class="page-title">
         Итоги отчетного периода
      </div>
   </div>
   <ol class="breadcrumb page-breadcrumb pull-right">
      <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li class="active">Dashboard</li>
   </ol>
   <div class="clearfix">
   </div>
</div>
<div class="page-content">
   <div id="tab-general">
      <?php echo modules::run('budget_widget/widget') ; ?>
   </div>
</div>
<!-- <div class="page-content">
   <div class="tabs">
      <ul class="nav nav-tabs">
         <li class="active"><a href="/#tab-1" data-toggle="tab">Расход</a></li>
         <li><a href="/#tab-2" data-toggle="tab">Доход</a></li>
      </ul>
      <br>
      <div class="tab-content">
         <div class="tab-pane fade in active" id="tab-1">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <?=form_open("main/add_expense");?>
                     <fieldset>
                        <div class="row">
                           <div class="col-xs-6">
                              <div class="form-group">
                                 <label class="control-label sr-only" for="textinput">Сумма</label>
                                 <input type="text" class="form-control lg-input" id="sum" name="sum" placeholder="Сумма">
                              </div>
                           </div>
                           <div class="col-xs-6">
                              <div class="form-group">
                                 <label class="control-label sr-only" for="textinput">Дата</label>
                                 <input type="text" class="form-control" id="date" name="date" placeholder="Дата">
                                 <span class="text-danger"><?php echo form_error('date'); ?>
                                 </span> 
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label sr-only" for="category">Категория</label>
                           <?php
                              $attributes = 'class = "form-control" id = "sel2"';
                              echo form_dropdown('sel2', $expense_category, set_value('category'),$attributes);
                              ?>
                           <span class="text-danger"><?php echo form_error('sel2'); ?></span>
                        </div>
                        <div class="form-group">
                           <label class="control-label sr-only" for="account">Счет</label>
                           <?php 
                              $attributes = 'class = "form-control" id = "sel1" name="sel1"';
                              echo form_dropdown('sel1', $account, set_value('account'), $attributes);
                              ?>
                           <span class="text-danger"><?php echo form_error('sel1'); ?></span>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="singlebutton"></label>
                           <button type="submit" id="singlebutton" class="btn btn-success btn-block btn-lg">Сохранить
                           </button>
                        </div>
                     </fieldset>
                     <?=form_close();?>
                     <script type="text/javascript">
                        $(document).ready(function() {
                        setTimeout ("$('.alert').hide('drop');", 3000);
                        });
                     </script>
                     <?php echo $this->session->flashdata('msg'); ?>
                  </div>
                  <div class="col-md-6">
                     <table class="table">
                        <caption class="text-left">Операции за сегодня</caption>
                        <tbody>
                           <tr>
                              <th>Категория</th>
                              <th class="text-right">Сумма</th>
                           </tr>
                           <? for($i = 0; $i < count($last_op_exp); ++$i): ?>
                           <tr>
                              <td>
                                 <a href="" onclick="return confirm('Удалить операцию?')" class="glyphicon glyphicon-trash"></a> 
                                 <?=$last_op_exp[$i]->title_categor;?>                          
                              </td>
                              <td class="text-right">
                                 <span class="text-danger">&nbsp;−&nbsp;
                                 <span class="whole">
                                 <?=$last_op_exp[$i]->sum;?>
                                 </span>
                                 <span class="text-muted small">&nbsp;грн. </span>
                                 </span>
                              </td>
                           </tr>
                           <? endfor; ?>
                           <tr class="">
                              <td colspan="2">
                                 <p class="text-danger"><strong>Расход за день: <span class="text-danger">&nbsp;−&nbsp;<span class="whole">
                                    <?=$sum_exp[0]['SUM(sum)']; ?>
                                    </span><span class="text-muted">.00</span>&nbsp;<span class="text-muted small">&nbsp;грн. </span></span></strong>
                                 </p>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="tab-2">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <?=form_open("main/add_income");?>
                     <fieldset>
                        <div class="row">
                           <div class="col-xs-6">
                              <div class="form-group">
                                 <label class="control-label sr-only" for="textinput">Сумма</label>
                                 <input type="text" class="form-control lg-input" id="sum" name="sum" placeholder="Сумма">
                              </div>
                           </div>
                           <div class="col-xs-6">
                              <div class="form-group">
                                 <label class="control-label sr-only" for="textinput">Дата</label>
                                 <input type="text" class="form-control" id="date1" name="date" placeholder="Дата">
                                 <span class="text-danger"><?php echo form_error('date'); ?>
                                 </span> 
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label sr-only" for="category">Категория</label>
                           <?php
                              $attributes = 'class = "form-control" id = "sel2"';
                              echo form_dropdown('sel2', $income_category, set_value('category'),$attributes);
                              ?>
                           <span class="text-danger"><?php echo form_error('sel2'); ?></span>
                        </div>
                        <div class="form-group">
                           <label class="control-label sr-only" for="account">Счет</label>
                           <?php 
                              $attributes = 'class = "form-control" id = "sel1" name="sel1"';
                              echo form_dropdown('sel1', $account, set_value('account'), $attributes);
                              ?>
                           <span class="text-danger"><?php echo form_error('sel1'); ?></span>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="singlebutton"></label>
                           <button type="submit" id="singlebutton" class="btn btn-success btn-block btn-lg">Сохранить
                           </button>
                        </div>
                     </fieldset>
                     <?=form_close();?>               
                     <script type="text/javascript">
                        $(document).ready(function() {
                        setTimeout ("$('.alert').hide('drop');", 3000);
                        });
                     </script>
                     <?php echo $this->session->flashdata('msg'); ?>
                  </div>
                  <div class="col-md-6">
                     <table class="table">
                        <caption class="text-left">Операции за сегодня</caption>
                        <tbody>
                           <tr>
                              <th>Категория</th>
                              <th class="text-right">Сумма</th>
                           </tr>
                           <? for($i = 0; $i < count($last_op_inc); ++$i): ?>
                           <tr>
                              <td>
                                 <a href="" onclick="return confirm('Удалить операцию?')" class="glyphicon glyphicon-trash"></a> 
                                 <?=$last_op_inc[$i]->title_categor;?>                          
                              </td>
                              <td class="text-right">
                                 <span class="text-danger">&nbsp;+&nbsp;
                                 <span class="whole">
                                 <?=$last_op_inc[$i]->sum;?>
                                 </span>
                                 <span class="text-muted small">&nbsp;грн. </span>
                                 </span>
                              </td>
                           </tr>
                           <? endfor; ?>
                           <tr class="">
                              <td colspan="2">
                                 <p class="text-danger"><strong>Доход за день: <span class="text-danger">&nbsp;+&nbsp;<span class="whole">
                                    <?=$sum_inc[0]['SUM(sum)']; ?>
                                    </span><span class="text-muted">.00</span>&nbsp;<span class="text-muted small">&nbsp;грн. </span></span></strong>
                                 </p>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> -->