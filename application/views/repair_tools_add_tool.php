<h1>新增工具</h1>
<?=form_open('Repair_tools/add_tool');?>
 <h2>維修單編號：<?=$lists_id?></h2>
<table>
	<tr>
		<td>類別名稱</td>
		<td><?=$tooltype->type_name;?>
		</td>
	</tr>
	<tr>
		<td>工具名稱</td>
		<td></td>
	</tr>
	<?php foreach ($tool_list as $row) : ?>
		<tr>
			<td></td>
			<td><div class="radio-inline">
				<?=form_radio('tool_id', $row->id, FALSE);?>
				<?=form_label($row->tool_name, 'tname');?>
			</div></td>
		</tr>
	<?php endforeach; ?>
	<tr>
		<td>新增工具名稱</td>
		<td><?=form_error('tool_name_new')?>
		<?=form_input('tool_name_new', set_value('tool_name_new'))?></td>
	</tr>
	<tr>
		<td>工具數量</td>
		<td><?=form_error('tool_number')?>
		<?=form_input('tool_number', set_value('tool_number'))?></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>