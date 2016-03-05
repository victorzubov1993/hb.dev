<div class="container">
	<ul class="nav nav-pills">
	        <li class=""><a href="http://hb.dev/main/report/day/">Дни</a></li>
	        <li class=""><a href="http://traty.dev/?controller=report&amp;action=view&amp;report_type=week">Недели</a></li>
	        <li class=""><a href="http://hb.dev/main/report/month">Месяца</a></li>
	</ul>
	<h3>Отчет за год</h3>
	<div class="row"> </div>
	<div class="row">
		<div class="col-xs-12">
			<table class="table">
				<tbody>
					<tr>
						<th>Дата</th>
						<th class="text-right">Доход / Расход</th>
					</tr>
					<!-- <pre>
						<?php var_dump($array);?>
					</pre> -->
					<? for($i = 1; $i <= count($array); ++$i) :?>
						<tr>
							<td>
								<a href="http://hb.dev/main/report/month/?year=
								<?php
									 echo '2016'.'&month='.$array[$i]['month'];
								?>">
								<?php
									 echo date("F",mktime(0,0,0,$array[$i]['month']));
								?>
								</a>
							</td>
							<td class = "text-right">
								<span class="text-success">
									+<span class="whole"><?php echo $array[$i]['expense_sum'];?></span>
									<span class="text-muted small">грн</span>
								</span>
								<br>
								<span class="text-danger">
									-<span class="whole"><?php echo $array[$i]['income_sum'];?></span>
									<span class="text-muted small">грн</span>
								</span>
							</td>
						</tr>
					<? endfor;?>
				</tbody>
			</table>
		</div>
	</div>
</div>


