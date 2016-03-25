<table id="dg" class="easyui-datagrid" style="width:100%;height:100%;"
			url="main/index?grid=true&oper=5"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="id" width="50" hidden="true">ID</th>
				<th field="date" width="50">Дата</th>
				<th field="sum" width="50">Сумма</th>
				<th field="category" width="50">Категория</th>
				<th field="account" width="50">Счет</th>
				<th field="operation" width="50" hidden="true">Тип операции</th>
				
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Новая операция</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Редактировать</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Удалить операцию</a>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:280px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		
		<form id="fm" method="post">
			<div class="fitem">
				<label>Тип операции:</label>
					<input id="cc1" class="easyui-combobox" name="operation" style="height: auto;" data-options="
				        valueField: 'id',
				        textField: 'text',

				        url: 'main/get_operation',
				        onSelect: function(rec){
				            var url = 'main/get_category?id='+rec.id;
				            $('#cc2').combobox('reload', url);
				        }">
			</div>			
			<div class="fitem">
				<label>Дата:</label>
				<input id="dd" type="text" class="easyui-datebox" name="date" required="required" data-options="formatter:myformatter,parser:myparser">
			</div>
			<div class="fitem">
				<label>Сумма:</label>
				<input name="sum" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>Категория:</label>
				    <input id="cc2" class="easyui-combobox" name="category" data-options="valueField:'id',textField:'text'">
			</div>
			<div class="fitem">
				<label>Счет:</label>
					    <input id="cc3" class="easyui-combobox" name="account"
        				data-options="valueField:'id',textField:'text',url:'main/get_account'">
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
	</div>
	
	<script type="text/javascript">
		var url;			
			function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','Новая операция');
			$('#fm').form('clear');
			url = 'main/create';
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');					
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');				
				$('#cc2').combobox('reload', 'main/get_category?id='+row.operation);	
				$('#fm').form('load',row);								
				url = 'main/update?id='+row.id;
			}
		}
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				ajax:'true',							
				success: function(result){						
					$('#dlg').dialog('close');		// close the dialog
					$('#dg').datagrid('reload');	// reload the user data
					}
				});
		}
		function destroyUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Внимание','Вы действительно хотите удалить выбранные данные?',function(r){
					if (r){
						$.post('main/delete?id='+row.id ,
							function(result){
								$('#dg').datagrid('reload');
							});
					}
				});
			}
		}
	</script>
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:80px;
		}
		.fitem input{
			width:160px;
		}
	</style>