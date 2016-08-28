<h1 class="bg-success">新增零件</h1>
<?=form_open('Repair_tool_parts/add_part/' . $work_list . '/' . $lists_id . '/' . $tooltype->id);?>
<?php
        // 取出工具代號轉換用字串陣列
      $orig_tid;
      $rep_tid;
     for ($j =0; $j < count($tool_list); $j++)
    {
      $orig_tid[$j] = 'TOOL' . $tool_list[$j]->id;
      $rep_tid[$j] = $tool_list[$j]->tool_name;
    }
?>
 <h2 class="bg-info">工具編號：<?=$lists_id?></h2>
<table class="table">
	<tr>
		<td class="text-center">類別名稱</td>
		<td><?=$tooltype->type_name;?>
		</td>
		<td class="text-center">工具名稱</td>
		<td><?=str_replace($orig_tid, $rep_tid, 'TOOL' . $repair_list->tool_id);?></td>
	</tr>
	<tr>
		<td class="text-center">零件名稱</td>
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
		<td class="text-center">新增零件名稱</td>
		<td><?=form_radio('parts_id', '', FALSE);?>
		<?php
			$newpart_data = array (
			'name'	=> 'part_name_new',
			'class'	=>	'form-control');
		echo form_input($newpart_data);
		?>
		</td>
		<td></td>
		<td>			

		</td>
	</tr>
	<tr>
		<td class="text-center">價格</td>
		<td><?=form_error('price')?>
		<?php
			$price_data = array (
			'name'	=> 'price',
			'class'	=>	'form-control',
			'value'	=>	'0');
		echo form_input($price_data);
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
    ?>  ｜<a href="<?=config_item('base_url');?>/index.php/Lists/modify/<?=$work_list;?>" class="btn btn-primary" accesskey="b">回維修單</a> ｜ <a href="<?=config_item('base_url');?>/index.php/Lists/" class="btn btn-primary" accesskey="l">回維修單列表</a>｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>