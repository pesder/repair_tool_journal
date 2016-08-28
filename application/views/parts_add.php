<h1 class="bg-warning text-center">新增零件</h1>
<?=form_open('Parts/add');?>
 
<table class="table">
	<tr>
		<td class="text-center">類別名稱</td>
		<td><?=form_error('type')?>
			<?php
			foreach ($tooltype as $row) {
				if($row->id == 2)
				{
					echo '<div class="radio-inline">';
					echo form_radio('type', $row->id, TRUE);
					echo form_label($row->type_name, 'typename');
					echo '</div>';
				}
				else
				{
					echo '<div class="radio-inline	">';
					echo form_radio('type', $row->id, FALSE);
					echo form_label($row->type_name, 'typename');
					echo '</div>';
				}
			}

			?>
		</td>
	</tr>
	<tr>
		<td class="text-center">零件名稱</td>
		<td><?=form_error('p_name')?>
		   <?php
		$part_data = array (
		'name'	=>	'p_name',
		'class'	=>	'form-control');
		echo form_input($part_data);
		?></td>
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
    ?> ｜ <a href="<?=config_item('base_url');?>/index.php/Vendor/index/" class="btn btn-primary" accesskey="p">回零件列表</a> ｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>