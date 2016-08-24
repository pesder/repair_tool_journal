<div class="bg-primary"><h1 >建立工作訂單 Step2 輸入送修人姓名</h1></div>
<?=form_open('Lists/choose_name');?>
<?php
	$search = array('0','1');
	$replace = array('否','是');
?>

<table class="table">
<tr>
	<td>送修日期</td>
	<td>
		<?=form_error('start_date')?>
		<?php $start_date = (validation_errors() != '') ? set_value('start_date') : $lists_date; ?>
		<?=form_input('start_date', $start_date)?>
	</td>
</tr>
<tr>
	<td>手機/電話號碼</td>
	<td>
		<?=form_error('phone')?>
		<?php $phone = (validation_errors() != '') ? set_value('phone') : $lists_phone; ?>
		<?=form_input('phone', $phone)?></td>
</tr>
<tr>
	<td>客戶姓名</td>
	<td><?=form_error('customer_name')?>
		<?=form_input('customer_name', set_value('customer_name'))?></td>
</tr>
</table>
<?php
	if(empty($lists_his))
	{
		echo '<h2>查無過去送修紀錄</h2>';
	}
	else 
	{
		echo '<h2>查到以下送修紀錄</h2>';
	}
?>
<table class="table">
<tr>
	<td>選取</td>
	<td>送修日期</td>
	<td>電話</td>
	<td>客戶姓名</td>
	<td>是否結案</td>
</tr>
<?php foreach ($lists_his as $row): ?>
<tr>
	<td><?=form_radio('customer_name_old', $row->customer_name, FALSE);?></td>
	<td><?=$row->start_date;?></td>
	<td><?=$row->phone;?></td>
	<td><?=$row->customer_name;?></td>
	<td><?=str_replace($search, $replace, $row->closed);?></td>
</tr>
<?php endforeach; ?>

</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>