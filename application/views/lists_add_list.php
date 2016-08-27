<div class="bg-primary"><h1 >建立工作訂單 Step1 輸入日期與手機</h1></div>
<?=form_open('Lists/add_list');?>
<table class="table">
<tr>
	<td>送修日期</td>
	<td><?=form_error('start_date')?>
	<?php
	/*
	if(empty($this->session->s_date))
	{
		$i_date = date("Y-m-d");
	}
	else
	{
		$i_date = $this->session->s_date;
	}
	*/
	if (isset($_POST['start_date']))
	{
		echo $_POST['start_date'];
	}
	$date_data = array (
		'name'	=>	'start_date',
		'id'	=>	'datepicker',
		'placeholder'	=> '選擇日期');
	echo form_input($date_data);
	?>
	</td>
</tr>
<tr>
	<td>手機/電話號碼</td>
	<td>
		<?=form_error('phone')?>
		<?=form_input('phone', set_value('phone'))?>
	</td>
</tr>

</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>