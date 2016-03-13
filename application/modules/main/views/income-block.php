<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
   <div class="page-header pull-right">
      <div class="page-title">
         Таблица доходов
      </div>
   </div>         
   <ol class="breadcrumb page-breadcrumb pull-center">
      <div class="askquestion"><a class="searchbutton" href="#registerModal" data-toggle="modal">Новая операция</a></div>      
   </ol>   
   <div class="clearfix"></div>
</div>
<div class="page-content">
<!-- <button type="submit" id="bttfilt" class="btn btn-primary">Filter</button> -->
   <script type="text/javascript">
         $(document).ready(function(){
               $('#bttfilt').click(function(){
                  $.ajax({
                     type: 'GET',
                     url: '<?php echo site_url('main/filter');?>',
                     success: function(html){
                        $('.page-content').html(html);
                        console.log(html);
                     }
                  });
               });
         });
   </script>
   
   <div id="tab-general">
   	<div class="row mbl">
   		<div class="col-lg-8">
   			<div class="panel">
   				<div class="panel-body">
   					<div class="row">
   						<div class="col-lg-12">
   							<h4 class="mbs">Доходы</h4>
   							<table class="table">
   								<tbody>
   									<tr>
   										<th>Дата</th>
   										<th>Категория</th>
   										<th>Сумма</th>
   										<th>Счет</th>
   									</tr>
   									<? for($i = 0; $i < count($income);++$i):?>
   										<tr>
   											<td><?php echo $income[$i]->date;?></td>
   											<td><?php echo $income[$i]->title_categor;?></td>
   											<td><?php echo $income[$i]->sum;?></td>
   											<td><?php echo $income[$i]->title;?></td>
   										</tr>
   									<? endfor;?>
   								</tbody>
   							</table>
   						</div>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
   <div id="page-content"></div>
</div>
<?php $this->load->view('includes/income-modal'); ?>