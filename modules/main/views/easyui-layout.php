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
