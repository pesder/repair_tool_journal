<h1>新增零件</h1>
<?=form_open('Repair_tool_parts/add_part/' . $work_list . '/' . $lists_id . '/' . $tooltype->id);?>
<?php
        // 取出工具代號轉換用字串陣列
      $orig_tid;
      $rep_tid;
     for ($j =0; $j < count($tool_list); $j++)
    {
      $orig_tid[$j] = 'T' . $tool_list[$j]->id;
      $rep_tid[$j] = $tool_list[$j]->tool_name;
    }
?>
 <h2>工具編號：<?=$lists_id?></h2>
<table>
	<tr>
		<td>類別名稱</td>
		<td><?=$tooltype->type_name;?>
		</td>
		<td>工具名稱</td>
		<td><?=str_replace($orig_tid, $rep_tid, 'T' . $repair_list->tool_id);?></td>
	</tr>
	<tr>
		<td>零件名稱</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<?php foreach ($part_list as $row) : ?>
		<tr>
			<td></td>
			<td><div class="radio-inline">
				<?=form_radio('parts_id', $row->id, FALSE);?>
				<?=form_label($row->p_name, 'pname');?>
			</div></td>
			<td></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
	<tr>
		<td>新增零件名稱</td>
		<td><?=form_radio('parts_id', '', FALSE);?>
		<?=form_input('part_name_new', set_value('part_name_new'))?></td>
		<td></td>
		<td>			

		</td>
	</tr>
	<tr>
		<td>價格</td>
		<td><?=form_error('price')?>
		<?=form_input('price', set_value('price', 0))?></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>