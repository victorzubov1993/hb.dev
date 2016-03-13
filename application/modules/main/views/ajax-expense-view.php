   <div id="tab-general">
   	<div class="row mbl">
   		<div class="col-lg-8">
   			<div class="panel">
   				<div class="panel-body">
   					<div class="row">
   						<div class="col-md-8">
   							<h4 class="mbs">Расходы</h4>
   							<table class="table">
   								<tbody>
   									<tr>
   										<th>Дата</th>
   										<th>Категория</th>
   										<th>Сумма</th>
   										<th>Счет</th>
   									</tr>
   									<? for($i = 0; $i < count($expense);++$i):?>
   										<tr>
   											<td><?php echo $expense[$i]->date;?></td>
   											<td><?php echo $expense[$i]->title_categor;?></td>
   											<td><?php echo $expense[$i]->sum;?></td>
   											<td><?php echo $expense[$i]->title;?></td>
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