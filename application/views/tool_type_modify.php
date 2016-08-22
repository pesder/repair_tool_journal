<h1>修改工具類別</h1>
<?=form_open('Tool_type/modify/' . $tool_type->id)?>
<table>
	<tr>
		<td>類別名稱</td>
		<td><?=form_error('type_name')?>
		<?php $type_name = (validation_errors() != '') ? set_value('type_name') : $tool_type->type_name; ?>
		<?=form_input('type_name', $type_name)?></td>
	</tr>

	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>