<h1>新增工具類別</h1>
<?=form_open('Tools_manage/add_tool_type');?>
<table>
	<tr>
		<td>類別名稱/td>
		<td><?=form_error('type_name')?>
		<?=form_input('type_name', set_value('type_name'))?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>