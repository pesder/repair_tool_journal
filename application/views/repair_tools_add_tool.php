<h1 class="bg-success">新增工具</h1>
<?=form_open('Repair_tools/add_tool/' . $lists_id . '/' . $tooltype->id);?>
<?php
        // 取出廠商代號轉換用字串陣列
      $orig_vid;
      $rep_vid;
     for ($j =0; $j < count($vendor); $j++)
    {
      $orig_vid[$j] = $vendor[$j]->id;
      $rep_vid[$j] = $vendor[$j]->v_name;
    }
?>
 <h2  class="bg-info">維修單編號：<?=$lists_id?></h2>
<table class="table">
	<tr>
		<td class="text-center">類別名稱</td>
		<td><?=$tooltype->type_name;?>
		</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td class="text-center">工具名稱</td>
		<td></td>
		<td class="text-center">廠牌</td>
		<td></td>
	</tr>
	<?php foreach ($tool_list as $row) : ?>
		<tr>
			<td></td>
			<td><div class="radio-inline">
				<div class="form-group">
				<?=form_radio('tool_id', $row->id, FALSE);?>
				<?=form_label($row->tool_name, 'tname');?>
				</div>
			</div></td>
			<td></td>
			<td><?=str_replace($orig_vid, $rep_vid, $row->vendor); ?></td>
		</tr>
	<?php endforeach; ?>
	<tr>
		<td class="text-center">新增工具名稱</td>
		<td>
		<div class="form-group">
		<?=form_radio('tool_id', '', FALSE);?>
		<?php
			$newtool_data = array (
			'name'	=> 'tool_name_new',
			'class'	=>	'form-control');
		echo form_input($newtool_data);
		?>
		</div>
		</td>
		<td class="text-center">廠牌</td>
		<td>			
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
		?>
		</td>
	</tr>
	<tr>
		<td class="text-center">工具數量</td>
		<td><?=form_error('tool_number')?>
		<?php
			$number_data = array (
			'name'	=> 'tool_number',
			'class'	=>	'form-control',
			'value'	=>	'1');
		echo form_input($number_data);
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
    ?> ｜<a href="<?=config_item('base_url');?>/index.php/Lists/modify/<?=$lists_id;?>" class="btn btn-primary" accesskey="b">回維修單</a>｜ <a href="<?=config_item('base_url');?>/index.php/Lists/" class="btn btn-primary" accesskey="l">回維修單列表</a>｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>