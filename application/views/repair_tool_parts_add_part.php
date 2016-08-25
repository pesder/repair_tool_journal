<h1>新增零件</h1>
<?=form_open('Repair_tool_parts/add_part/' . $lists_id . '/' . $tooltype->id);?>

 <h2>工具編號：<?=$lists_id?></h2>
<table>
	<tr>
		<td>類別名稱</td>
		<td><?=$tooltype->type_name;?>
		</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>零件名稱</td>
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
		<td>新增零件名稱</td>
		<td>
		<?=form_input('tool_name_new', set_value('tool_name_new'))?></td>
		<td>廠牌</td>
		<td>			

		</td>
	</tr>
	<tr>
		<td>價格</td>
		<td><?=form_error('price')?>
		<?=form_input('price', set_value('0'))?></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>