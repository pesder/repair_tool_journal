<h1 class="bg-warning text-center">新增工具</h1>
<?=form_open('Tools/add');?>
 
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
		<td class="text-center">工具名稱</td>
		<td><?=form_error('tool_name')?>
		<?php
		$tool_data = array (
		'name'	=>	'tool_name',
		'class'	=>	'form-control');
		echo form_input($tool_data);
		?></td>
	</tr>
	<tr>
		<td class="text-center">廠牌名稱</td>
		<td><?=form_error('vendor')?>
			<?php
			foreach ($vendor as $row) {
				if($row->id == 2)
				{
					echo '<div class="radio-inline">';
					echo form_radio('vendor', $row->id, TRUE);
					echo form_label($row->v_name, 'vname');
					echo '</div>';
				}
				else
				{
					echo '<div class="radio-inline">';
					echo form_radio('vendor', $row->id, FALSE);
					echo form_label($row->v_name, 'vname');
					echo '</div>';
				}
			}
			

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
    ?> ｜ <a href="<?=config_item('base_url');?>/index.php/Tools/index/" class="btn btn-primary" accesskey="t">回工具列表</a> ｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>