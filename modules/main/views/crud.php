<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>CRUD CodeIgniter dengan EasyUI - Dida Nurwanda</title>
          <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
          <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
          <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/color.css">
          <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
          <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
          <script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
            
   </head>
   
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
               <a href="" rel="true" data="6" class="link" style="text-decoration: none;">Таблица доходов</a><br>
               <span>Гистограма доходов</span>
            </div>
            <br/>
            <div class="easyui-panel" title="Расходы" collapsible="true" style="width:200px;height:auto;padding:10px;">
               <a href="" rel="true" data="5" class="link" style="text-decoration: none;">Таблица расходов</a><br>
               <span>Гистограма расходов</span>
            </div>
         </div>
      </div>
      <!-- center -->
      <div class="contenti" data-options="region:'center'" style="overflow:hidden;padding:1px">
         <?php $this->load->view('main/grid'); ?>
      </div>
      <script type="text/javascript">
		    $(document).ready(function(){
		   		$('.link').click(function(){
		         	var value = $(this).attr('rel');
		         	var value1 = $(this).attr('data');
		         	var dataString = 'grid=' + value;
		         	var dataString1 = '&oper=' + value1;
		        $('#dg').datagrid({
		         	url:'main/index?' +dataString +dataString1
		         	})
		        
		         return false;
		         
		        })
		         
		   		$('.link').click(function(){
		         	var value = $(this).attr('rel');
		         	var value1 = $(this).attr('data');
		         	var dataString = 'grid=' + value;
		         	var dataString1 = '&oper=' + value1;
		        $('#dg').datagrid({
		         	url:'main/index?' +dataString +dataString1
		         	})
		         return false;
		        })
			});
      </script>      
   </body>
</html>