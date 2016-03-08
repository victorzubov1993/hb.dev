<!-- <div class="container my">
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
</div> -->

<div id="sum_box" class="row mbl">
    <? for ($i = 0; $i<count($widget);$i++) :?>
    	<div class="col-sm-6 col-md-3">
    		<div class="panel profit db mbm">
    			<div class="panel-body">
    				<p class="icon">
                        <i class="icon fa fa-money"></i>
                    </p>
    				<h4 class="value">
    					<span><?php echo $widget[$i]->balance;?></span>
    					<span>UA</span>
    				</h4>
    				<p class="description">
    					<?php echo $widget[$i]->title;?>
    				</p>    							
    			</div>
    		</div>
    	</div>
    <?endfor;?>  
</div>