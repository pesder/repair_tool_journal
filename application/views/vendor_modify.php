<h1>修改廠商類別</h1>
<?=form_open('Vendor/modify/' . $vendor->id)?>
<table>
	<tr>
		<td>廠商名稱</td>
		<td><?=form_error('v_name')?>
		<?php $v_name = (validation_errors() != '') ? set_value('v_name') : $vendor->v_name; ?>
		<?=form_input('v_name', $v_name)?></td>
	</tr>

	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>