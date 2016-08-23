<h1>新增工具</h1>
<?=form_open('Tools/add');?>
    <?php
    // 取出工具種類代號轉換用字串陣列
      $orig_typeid;
      $rep_typeid;
     for ($i =0; $i < count($tooltype); $i++)
    {
      $orig_typeid[$i] = $tooltype[$i]->id;
      $rep_typeid[$i] = $tooltype[$i]->type_name;
    }
    // 取出廠商代號轉換用字串陣列
      $orig_vid;
      $rep_vid;
     for ($j =0; $j < count($vendor); $j++)
    {
      $orig_vid[$j] = $tooltype[$j]->id;
      $rep_vid[$j] = $tooltype[$j]->v_name;
    }

    ?>
<table>
	<tr>
		<td>類別名稱</td>
		<td><?=form_error('type')?>
		<?php
		array_unshift($tooltype_list, "請選擇類別");
		?>
		<?=form_dropdown('type', $tooltype_list)?></td>
	</tr>
	<tr>
		<td>工具名稱</td>
		<td><?=form_error('tool_name')?>
		<?=form_input('tool_name', set_value('tool_name'))?></td>
	</tr>
	<tr>
		<td>廠牌名稱</td>
		<td><?=form_error('vendor')?>
		<?php
			array_unshift($vendor_list, "請選擇廠牌");
		?>
		<?=form_dropdown('vendor', $vendor_list)?></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>