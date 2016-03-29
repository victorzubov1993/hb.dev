<body class="easyui-layout">
      <!-- top -->
      <div data-options="region:'north',split:true" style="height:60px;padding:10px;">
         <a href="index" style="font-size:30px; text-decoration: none;">Автоматизация учета личных средств</a>
         <span style="float:right; font-size:30px"></span>
      </div>
      <!-- left -->
      <div data-options="region:'west',split:true" title="Главное меню" style="width:250px;padding1:1px;overflow:hidden;">
         <div style="width:200px;height:auto;background:#7190E0;padding:5px;">
            <div class="easyui-panel" title="Доходы" collapsible="true" style="width:200px;height:auto;padding:10px;">
               <a href="<?php echo site_url('main/income');?>" rel="true" data="6" class="link" style="text-decoration: none;">Таблица доходов</a><br>
               <span>Гистограма доходов</span>
            </div>
            <br/>
            <div class="easyui-panel" title="Расходы" collapsible="true" style="width:200px;height:auto;padding:10px;">
               <a href="<?php echo site_url('main/expense');?>" rel="true" data="5" class="link" style="text-decoration: none;">Таблица расходов</a><br>
               <span>Гистограма расходов</span>
            </div>
         </div>
      </div>
	  <div data-options="region:'east',split:true" title="Фильтр" style="width:250px;padding1:1px;overflow:hidden;">
		<form name="form" method="post" action="expense">
		<ul>			
			<li> Категории:
				<ul>
					<li><input id="filter_03" type="checkbox" name="vendors[]" value="7"><label for="filter_03">Проезд</label></li>
					<li><input id="filter_04" type="checkbox" name="vendors[]" value="8"><label for="filter_04">Мобильная связь</label></li>					
				</ul>	
			</li>
			<li> Счет:
				<ul>
					<li><input id="filter_05" type="checkbox" name="vendors[]" value="3"><label for="filter_05">ПриватБанк</label></li>
					<li><input id="filter_06" type="checkbox" name="vendors[]" value="1"><label for="filter_06">Дом</label></li>					
				</ul>	
			</li>
		</ul>
		<input type="submit" name="filter" value="Подобрать" />
	</form>
	  </div>
