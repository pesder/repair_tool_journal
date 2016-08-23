<h1>修改零件</h1>
<?=form_open('Tools/modify/' . $parts->id)?>
<table>
	<tr>
		<td>類別名稱</td>
		<td><?=form_error('type')?>
			<?php
			foreach ($tooltype as $row) {
				if($row->id == $parts->type)
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
		<td>零件名稱</td>
		<td><?=form_error('p_name')?>
		<?php $p_name = (validation_errors() != '') ? set_value('p_name') : $parts->p_name; ?>
		<?=form_input('p_name', $p_name)?></td>
	</tr>

</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>