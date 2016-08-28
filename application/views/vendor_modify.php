<h1 class="bg-warning text-center">修改廠商類別</h1>
<?=form_open('Vendor/modify/' . $vendor->id)?>
<table class="table">
	<tr>
		<td class="text-center">廠商名稱</td>
		<td><?=form_error('v_name')?>
		<?php $v_name = (validation_errors() != '') ? set_value('v_name') : $vendor->v_name; ?>
		<?php
		$vendor_data = array (
		'name'	=>	'v_name',
		'class'	=>	'form-control',
		'value'	=>	$v_name);
		echo form_input($vendor_data);
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
    ?> ｜ <a href="<?=config_item('base_url');?>/index.php/Vendor/index/" class="btn btn-primary" accesskey="v">回廠牌列表</a> ｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>