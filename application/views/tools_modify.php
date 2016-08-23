<h1>修改工具</h1>
<?=form_open('Tools/modify/' . $tools->id)?>
<table>
	<tr>
		<td>類別名稱</td>
		<td><?=form_error('type')?>
			<?php
			foreach ($tooltype as $row) {
				if($row->id == $tools->type)
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
		<td>工具名稱</td>
		<td><?=form_error('tool_name')?>
		<?php $tool_name = (validation_errors() != '') ? set_value('tool_name') : $tools->tool_name; ?>
		<?=form_input('tool_name', $tool_name)?></td>
	</tr>
	<tr>
		<td>廠牌名稱</td>
		<td><?=form_error('vendor')?>
			<?php
			foreach ($vendor as $row) {
				if($row->id == $tools->vendor)
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
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>