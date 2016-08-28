<h1 class="bg-info">選擇要查詢的電話號碼</h1>
<?=form_open('Search/query_number');?>
<table class="table">
<tr>
	<td  class="text-center">依電話查詢</td>
	<td><?=form_error('phone')?>
	<?php
		$phone_data = array (
		'name'	=>	'phone',
		'class'	=>	'form-control');
	echo form_input($phone_data);
	?>
	</td>
</tr>
</table>
    <?php
    $but1 = array (
      'name'  =>  'sent',
      'type'  =>  'submit',
      'content' =>  '將選取項目設為已取回',
      'class' =>  'btn btn-primary',
      'accesskey' =>  's');
    echo form_button($but1);
    ?> ｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>