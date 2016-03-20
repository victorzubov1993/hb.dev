<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>CRUD CodeIgniter dengan EasyUI - Dida Nurwanda</title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/bootstrap/easyui.css'); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/themes/icon.css'); ?>">
      <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/color.css">
      <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/jquery.easyui.min.js');?>"></script>	
   </head>
   <body class="easyui-layout">
      <!-- top -->
      <div data-options="region:'north',split:true" style="height:60px;padding:10px;">
         <span style="font-size:30px">Автоматизация учета личных средств</span>
         <span style="float:right; font-size:30px"></span>
      </div>
      <!-- left -->
      <div data-options="region:'west',split:true" title="Главное меню" style="width:250px;padding1:1px;overflow:hidden;">
         <!-- <div class="easyui-accordion" style="width:250px;height:150px;">
            <div title="Доходы" iconCls="icon-ok" style="overflow:auto;padding:10px;">
               <ul id="tt1" class="easyui-tree">
                  <li>
                     <span>Таблица доходов</span>                     
                  </li>
                  <li><span>Гистограма доходов</span></li>
               </ul>
            </div>
            <div title="Расходы" iconCls="icon-ok" style="overflow:auto;padding:10px;">
               <ul id="tt1" class="easyui-tree">
                  <li>
                     <span>Таблица расходов</span>                     
                  </li>
                  <li><span>Гистограма расходов</span></li>
               </ul>
            </div>
         </div> -->
             <div style="width:200px;height:auto;background:#7190E0;padding:5px;">
        <div class="easyui-panel" title="Доходы" collapsible="true" style="width:200px;height:auto;padding:10px;">
            <span>Таблица доходов</span><br>
            <span>Гистограма доходов</span>
        </div>
        <br/>
        <div class="easyui-panel" title="Расходы" collapsible="true" style="width:200px;height:auto;padding:10px;">
            <span>Таблица расходов</span><br>
            <span>Гистограма расходов</span>
        </div>        
    </div>
      </div>
      <!-- center -->
      <div data-options="region:'center'" title="Main Content" style="overflow:hidden;padding:1px">
         <?php $this->load->view('main/grid'); ?>
      </div>
   </body>
</html>