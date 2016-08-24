<div class="bg-primary"><h1 >建立工作訂單 Step2 輸入送修人姓名</h1></div>
<?=form_open('Lists/choose_name');?>
<?php
	$search = array('0','1');
	$replace = array('否','是');
?>
<table class="table">
<tr>
	<td>送修日期</td>
	<td><?=echo $lists_date;?></td>
</tr>
<tr>
	<td>手機/電話號碼</td>
	<td><?= echo $lists_phone;?></td>
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
	<td>echo form_radio('customer_name_old', $row->id, FALSE);</td>
	<td><?= echo $row->start_date;?></td>
	<td><?= echo $row->phone;?></td>
	<td><?= echo $row->customer_name;?></td>
	<td><?= echo str_replace($search, $replace, $row->closed);?></td>
</tr>
<?php endforeach; ?>

</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>