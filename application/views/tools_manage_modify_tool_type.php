<h1>修改工具類別</h1>
<?=form_open('Tool_type/modify' . $tool_type_id->id)?>
<table>
	<tr>
		<td>送修日期</td>
		<td><?=form_error('start_date')?>
		<?php $start_date = (validation_errors() != '') ? set_value('start_date') : $tool_type_id->start_date; ?>
		<?=form_input('start_date', $start_date)?></td>
	</tr>
	<tr>
		<td>手機號碼</td>
		<td><?=form_error('phone')?>
		<?php $phone = (validation_errors() != '') ? set_value('phone') : $tool_type_id->phone; ?>
		<?=form_input('phone', $phone)?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>