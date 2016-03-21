<table id="dg" class="easyui-datagrid" style="width:100%;height:100%;"
			url="main/index?grid=true&oper=5"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="date" width="50">Дата</th>
				<th field="sum" width="50">Сумма</th>
				<th field="title_categor" width="50">Категория</th>
				<th field="title" width="50">Счет</th>
				
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
		
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>Тип операции:</label>
					<input id="cc1" class="easyui-combobox" data-options="
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
				<input id="dd" type="text" class="easyui-datebox" required="required">
			</div>
			<div class="fitem">
				<label>Сумма:</label>
				<input name="sum" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>Категория:</label>
				    <input id="cc2" class="easyui-combobox" data-options="valueField:'id',textField:'text'">
			</div>
			<div class="fitem">
				<label>Счет:</label>
					    <input id="cc3" class="easyui-combobox" name="dept"
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
			$.extend($.fn.datebox.defaults,{
			formatter:function(date){
				var y = date.getFullYear();
				var m = date.getMonth()+1;
				var d = date.getDate();
				return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
			},
			parser:function(s){
				if (!s) return new Date();
				var ss = s.split('/');
				var d = parseInt(ss[0],10);
				var m = parseInt(ss[1],10);
				var y = parseInt(ss[2],10);
				if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
					return new Date(y,m-1,d);
				} else {
					return new Date();
				}
			}
			});
		

		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','Новая операция');
			$('#fm').form('clear');
			url = 'main/create';
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit User');
				$('#fm').form('load',row);
				url = 'update_user.php?id='+row.id;
			}
		}
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function destroyUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('Confirm','Are you sure you want to destroy this user?',function(r){
					if (r){
						$.post('destroy_user.php',{id:row.id},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
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