<h1 class="bg-warning text-center">修改工具類別</h1>
<?=form_open('Tool_type/modify/' . $tool_type->id)?>
<table class="table">
	<tr>
		<td  class="text-center">類別名稱</td>
		<td><?=form_error('type_name')?>
		<?php $type_name = (validation_errors() != '') ? set_value('type_name') : $tool_type->type_name; ?>
		<?php
		$type_data = array (
		'name'	=>	'type_name',
		'class'	=>	'form-control',
		'value'	=>	$type_name);
	echo form_input($type_data);
	?></td>
	</tr>

	<tr>
		<td></td>
		<td></td>
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
    ?> ｜ <a href="<?=config_item('base_url');?>/index.php/Tool_type/index/" class="btn btn-primary" accesskey="t">回工具種類列表</a> ｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>