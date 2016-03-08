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