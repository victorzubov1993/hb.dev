<div class="container my">
	<div class="table-responsive">
		<table class="table table-bordered table-condensed">
			<? for ($i = 0;$i<count($widget);$i++):?>
				<tr>		
					<td><?php echo anchor('main/budget/'.$widget[$i]->id,$widget[$i]->title);?></td>
					<td><?php echo anchor('main/budget/'.$widget[$i]->id,$widget[$i]->balance);?></td>
				</tr>
				<?endfor;?>
		</table>
	</div>			
</div>