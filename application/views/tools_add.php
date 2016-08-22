<h1>新增工具</h1>
<?=form_open('Tools/add');?>
<table>
	<tr>
		<td>類別名稱</td>
		<td><?=form_error('type')?>
		<?=form_input('type', set_value('type'))?></td>
	</tr>
	<tr>
		<td>工具名稱</td>
		<td><?=form_error('tool_name')?>
		<?=form_input('tool_name', set_value('tool_name'))?></td>
	</tr>
	<tr>
		<td>廠牌名稱</td>
		<td><?=form_error('vendor')?>
		<?=form_input('vendor', set_value('vendor'))?></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>