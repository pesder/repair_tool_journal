<h1>修改維修單</h1>
<?=form_open('Lists/modify/' . $lists_id->id)?>
<?php
    // 取出工具代號轉換用字串陣列
      $orig_toolid;
      $rep_toolid;
     for ($i =0; $i < count($toollist); $i++)
    {
      $orig_toolid[$i] = 'T' . $toollist[$i]->id;
      $rep_toolid[$i] = $toollist[$i]->tool_name;
    }
    // 取出工具種類代號轉換用字串陣列
      $orig_typeid;
      $rep_typeid;
     for ($i =0; $i < count($tooltype); $i++)
    {
      $orig_typeid[$i] = 'TP' . $tooltype[$i]->id;
      $rep_typeid[$i] = $tooltype[$i]->type_name;
    }
    // 取出零件種類代號轉換用字串陣列
      $orig_partid;
      $rep_partid;
     for ($i =0; $i < count($partlist); $i++)
    {
      $orig_partid[$i] = 'P' . $partlist[$i]->id;
      $rep_partid[$i] = $partlist[$i]->p_name;
    }
?>
<h2>維修單基本資料</h2>
<table class="table">
	<tr>
		<td>送修日期</td>
		<td><?=form_error('start_date')?>
		<?php $start_date = (validation_errors() != '') ? set_value('start_date') : $lists_id->start_date; ?>
		<?php
		$s_data = array (
			'name'	=> 'start_date',
			'id'	=> 'datepicker',
			'value'	=>	$start_date);
		echo form_input($s_data);
			?></td>
		<td><?php
				if ($lists_id->repaired == '0') 
				{
					echo form_checkbox('repaired', '0', FALSE);
				}
				else
				{
					echo form_checkbox('repaired', '1', TRUE);
				}
				?>
		已完修</td>
		<td>電話通知日期</td>
		<td>
				<?php $call_date = (validation_errors() != '') ? set_value('call_date') : $lists_id->call_date; ?>
		<?php
		$c_data = array (
			'name'	=> 'call_date',
			'id'	=> 'datepicker2',
			'value'	=>	$call_date);
		echo form_input($c_data);
			?>
		</td>

	</tr>
	<tr>
		<td>手機號碼</td>
		<td><?=form_error('phone')?>
		<?php $phone = (validation_errors() != '') ? set_value('phone') : $lists_id->phone; ?>
		<?=form_input('phone', $phone)?></td>
		<td><?php
				if ($lists_id->closed == '0') 
				{
					echo form_checkbox('closed', '0', FALSE);
				}
				else
				{
					echo form_checkbox('closed', '1', TRUE);
				}
				?>
		已結案
				</td>
		<td>取回/不修理日期</td>
		<td>
				<?php $return_date = (validation_errors() != '') ? set_value('return_date') : $lists_id->return_date; ?>
		<?php
		$r_data = array (
			'name'	=> 'return_date',
			'id'	=> 'datepicker3',
			'value'	=>	$return_date);
		echo form_input($r_data);
			?>	
		</td>
	</tr>
	<tr>
		<td>客戶姓名</td>
		<td><?=form_error('customer_name')?>
		<?php $customer_name = (validation_errors() != '') ? set_value('customer_name') : $lists_id->customer_name; ?>
		<?=form_input('customer_name', $customer_name)?></td>
		<td>維修價格</td>
		<td>		
		<?php $price = (validation_errors() != '') ? set_value('price') : $lists_id->price; ?>
		<?=form_input('price', $price)?></td>
		<td></td>

	</tr>
</table>
<table class="table">
	<tr>
		<td>工具狀況</td>
		<td>
			<?php $tools_status = (validation_errors() != '') ? set_value('tools_status') : $lists_id->tools_status; ?>
			<?=form_textarea('tools_status', $tools_status)?>
		</td>
		<td>修理工具<a href="<?=config_item('base_url');?>/index.php/Lists/collect_tool/<?=$lists_id->id?>" class="btn btn-primary">匯入工具描述</a></td>
		<td>
			<?php $tools_memo = (validation_errors() != '') ? set_value('tools_memo') : $lists_id->tools_memo; ?>
			<?=form_textarea('tools_memo', $tools_memo)?>
		</td>
		<td>修理零件<a href="<?=config_item('base_url');?>/index.php/Lists/collect_parts/<?=$lists_id->id?>" class="btn btn-primary">匯入零件描述</a></td>
		<td>
			<?php $parts_memo = (validation_errors() != '') ? set_value('parts_memo') : $lists_id->parts_memo; ?>
			<?=form_textarea('parts_memo', $parts_memo)?>
		</td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?php foreach ($tooltype as $row) : ?>
	<a href="<?=config_item('base_url');?>/index.php/Repair_tools/add_tool/<?=$lists_id->id?>/<?=$row->id?>" class="btn btn-primary">新增｛<?=$row->type_name?>｝工具</a>
<?php endforeach; ?>
<?php
	if (empty($lists_tools)) 
	{
		echo '<h2>尚未登記工具！</h2>'; 
	}
	else
	{
		echo '<h2>維修工具列表</h2>';
	}
?>
<table class="table">
		<tr>
			<th>編號</th>
			<th>種類</th>
			<th>工具名稱</th>
			<th>工具數量</th>
			<th>動作</th>
		</tr>

		<?php foreach ($lists_tools as $trow) : ?>
		<tr>
			<td><?= $trow->id ?></td>
			<td><?=str_replace($orig_typeid, $rep_typeid, 'TP' . $trow->type_id); ?></td>
			<td><?=str_replace($orig_toolid, $rep_toolid, 'T' . $trow->tool_id); ?></td>
			<td><?=$trow->tool_number ?></td>
			<td><a href="<?=config_item('base_url');?>/index.php/Repair_tools/modify/<?=$lists_id->id?>/<?=$trow->id?>/<?=$trow->type_id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Repair_tools/delete/<?=$lists_id->id?>/<?=$trow->id?>" class="btn btn-primary" onclick="return confirm('確定要刪除嗎？')">刪除</a> | <a href="<?=config_item('base_url');?>/index.php/Repair_tool_parts/add_part/<?=$lists_id->id?>/<?=$trow->id?>/<?=$trow->type_id?>" class="btn btn-primary">新增零件</a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php
	if (empty($lists_parts)) 
	{
		echo '<h2>尚未登記使用零件！</h2>'; 
	}
	else
	{
		echo '<h2>維修使用零件列表</h2>';
	}
?>
<table class="table">
		<tr>
			<th>編號</th>
			<th>種類</th>
			<th>零件名稱</th>
			<th>價格</th>
			<th>動作</th>
		</tr>

		<?php foreach ($lists_parts as $prow) : ?>
		<tr>
			<td><?= $prow->id ?></td>
			<td><?=str_replace($orig_typeid, $rep_typeid, 'TP' . $prow->type_id); ?></td>
			<td><?=str_replace($orig_partid, $rep_partid, 'P' . $prow->parts_id); ?></td>
			<td><?=$prow->price ?></td>
			<td><a href="<?=config_item('base_url');?>/index.php/Repair_tool_parts/modify/<?=$lists_id->id?>/<?=$prow->id?>/<?=$prow->type_id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Repair_tool_parts/delete/<?=$lists_id->id?>/<?=$prow->id?>" class="btn btn-primary" onclick="return confirm('確定要刪除嗎？')">刪除</a></td>
		</tr>
	<?php endforeach; ?>
<?=form_close()?>