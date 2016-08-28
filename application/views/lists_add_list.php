<div class="bg-primary"><h1 >建立工作訂單 Step1 輸入日期與手機</h1></div>
<?=form_open('Lists/add_list');?>
<table class="table">
<tr>
	<td class="text-center">送修日期</td>
	<td>
	<div class="col-xs-3">
	<?=form_error('start_date')?>
	<?php
	$date_data = array (
		'name'	=>	'start_date',
		'id'	=>	'datepicker',
		'class'	=>	'form-control',
		'value'	=>	$s_date,
		'placeholder'	=> '選擇日期');
	echo form_input($date_data);
	?>
	</div>
	</td>
</tr>
<tr>
	<td class="text-center">手機/電話號碼</td>
	<td>
	<div class="col-xs-3">
		<?=form_error('phone')?>
	<?php
		$phone_data = array (
		'name'	=>	'phone',
		'class'	=>	'form-control');
	echo form_input($phone_data);
	?>
	</div>
	</td>
</tr>

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