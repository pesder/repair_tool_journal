<h1 class="bg-info text-center">選擇要查詢的日期，預設會使用今天</h1>
<?=form_open('Search/list_someday');?>
<table class="table">
<tr>
	<td class="text-center">查詢日期</td>
	<td><?=form_error('start_date')?>
	<?php

	$i_date = date("Y-m-d");

	$date_data = array (
		'name'	=>	'start_date',
		'id'	=>	'datepicker',
		'class'	=>	'form-control',
		'value'	=>	$i_date,
		'placeholder'	=> '選擇日期');
	echo form_input($date_data);
	?>
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