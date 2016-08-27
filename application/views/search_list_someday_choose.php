<?=form_open('Search/list_someday');?>
<table class="table">
<tr>
	<td>查詢日期</td>
	<td><?=form_error('start_date')?>
	<?php

	$i_date = date("Y-m-d");

	$date_data = array (
		'name'	=>	'start_date',
		'id'	=>	'datepicker',
		'value'	=>	$i_date,
		'placeholder'	=> '選擇日期');
	echo form_input($date_data);
	?>
	</td>
</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>