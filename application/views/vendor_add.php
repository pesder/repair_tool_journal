<h1 class="bg-warning text-center">新增廠牌名稱</h1>
<?=form_open('Vendor/add');?>
<table class="table">
  <tr>
    <td class="text-center">廠牌名稱</td>
    <td><?=form_error('v_name')?>
    	<?php
		$vendor_data = array (
		'name'	=>	'v_name',
		'class'	=>	'form-control');
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