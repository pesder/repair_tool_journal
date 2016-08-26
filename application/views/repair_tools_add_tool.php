<h1>新增工具</h1>
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
 <h2>維修單編號：<?=$lists_id?></h2>
<table>
	<tr>
		<td>類別名稱</td>
		<td><?=$tooltype->type_name;?>
		</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>工具名稱</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php foreach ($tool_list as $row) : ?>
		<tr>
			<td></td>
			<td><div class="radio-inline">
				<?=form_radio('tool_id', $row->id, FALSE);?>
				<?=form_label($row->tool_name, 'tname');?>
			</div></td>
			<td></td>
			<td><?=str_replace($orig_vid, $rep_vid, $row->vendor); ?></td>
		</tr>
	<?php endforeach; ?>
	<tr>
		<td>新增工具名稱</td>
		<td>
		<?=form_radio('tool_id', '', FALSE);?>
		<?=form_input('tool_name_new', set_value('tool_name_new'))?></td>
		<td>廠牌</td>
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
		<td>工具數量</td>
		<td><?=form_error('tool_number')?>
		<?=form_input('tool_number', set_value('tool_number', 1))?></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>