<div class="bg-primary"><h1 >建立工作訂單 Step2 輸入送修人姓名</h1></div>
<?=form_open('Lists/choose_name');?>
<?php
	$search = array('0','1');
	$replace = array('否','是');
?>

<table class="table">
<tr>
	<td class="text-center">送修日期</td>
	<td><div class="col-xs-3">
		<?=form_error('start_date')?>
		<?php $start_date = (validation_errors() != '') ? set_value('start_date') : $lists_date; ?>
		<?php
			$date_data = array (
			'name'	=>	'start_date',
			'id'	=>	'datepicker',
			'class'	=>	'form-control',
			'value'	=>	$start_date,
			'placeholder'	=> '選擇日期');
		echo form_input($date_data);
		?>
		</div>
	</td>
</tr>
<tr>
	<td class="text-center">手機/電話號碼</td>
	<td><div class="col-xs-3">
		<?=form_error('phone')?>
		<?php $phone = (validation_errors() != '') ? set_value('phone') : $lists_phone; ?>
		<?php
			$phone_data = array (
			'name'	=>	'phone',
			'class'	=>	'form-control',
			'value'	=>	$phone);
		echo form_input($phone_data);
		?></div></td>
</tr>
<tr>
	<td class="text-center">客戶姓名</td>
	<td><div class="col-xs-3"><?=form_error('customer_name')?>
		<?php
			$name_data = array (
			'name'	=>	'customer_name',
			'class'	=>	'form-control');
		echo form_input($name_data);
		?></div></td>
</tr>
</table>
<?php
	if(empty($lists_his))
	{
		echo '<h2 class="bg-info">查無過去送修紀錄</h2>';
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
<tbody class="table-striped">
<?php foreach ($lists_his as $row): ?>
<tr>
	<td><?=form_radio('customer_name_old', $row->customer_name, FALSE);?></td>
	<td><?=$row->start_date;?></td>
	<td><?=$row->phone;?></td>
	<td><?=$row->customer_name;?></td>
	<td><?=str_replace($search, $replace, $row->closed);?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
    <?php
    $but1 = array (
      'name'  =>  'sent',
      'type'  =>  'submit',
      'content' =>  '送出',
      'class' =>  'btn btn-primary',
      'accesskey'	=>	's');
    echo form_button($but1);
    ?> ｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>