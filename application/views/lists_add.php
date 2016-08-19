<h1>新建維修單</h1>
<?=form_open('Lists/add');?>
<table>
	<tr>
		<td>送修日期</td>
		<td><?=form_error('start_date')?>
		<?=form_input('start_date', set_value('start_date'))?></td>
	</tr>
	<tr>
		<td>手機號碼</td>
		<td><?=form_error('phone')?>
		<?=form_input('phone', set_value('phone'))?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>