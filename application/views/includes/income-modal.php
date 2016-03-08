<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Новая операция</h4>
         </div>
         <div class="modal-body clearfix">
            <div id="registerModalerror" style="display: none;"></div>
            <form id="registerModalform" action="main/add_income" method="post">
               <div class="form-body pal">
                  <div class="form-group">
                        <label class="control-label sr-only" for="textinput">Сумма</label>
                        <input type="text" class="form-control lg-input" id="sum" name="sum" placeholder="Сумма">
                  </div>
                  <div class="form-group">
                        <label class="control-label sr-only" for="textinput">Дата</label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="Дата">
                        <span class="text-danger"><?php echo form_error('date'); ?>
                        </span> 
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
               <div class="form-actions text-right pal">
                  <button type="submit" class="btn btn-primary">
                  Подтвердить</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
