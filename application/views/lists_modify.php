<h1 class="bg-primary text-center">修改維修單</h1>
<?=form_open('Lists/modify/' . $lists_id->id)?>
<?php
    // 取出工具代號轉換用字串陣列
      $orig_toolid;
      $rep_toolid;
     for ($i =0; $i < count($toollist); $i++)
    {
      $orig_toolid[$i] = 'TOOL' . $toollist[$i]->id;
      $rep_toolid[$i] = $toollist[$i]->tool_name;
    }
    // 取出工具種類代號轉換用字串陣列
      $orig_typeid;
      $rep_typeid;
     for ($i =0; $i < count($tooltype); $i++)
    {
      $orig_typeid[$i] = 'TYPE' . $tooltype[$i]->id;
      $rep_typeid[$i] = $tooltype[$i]->type_name;
    }
    // 取出零件種類代號轉換用字串陣列
      $orig_partid;
      $rep_partid;
     for ($i =0; $i < count($partlist); $i++)
    {
      $orig_partid[$i] = 'PART' . $partlist[$i]->id;
      $rep_partid[$i] = $partlist[$i]->p_name;
    }
?>
<h2  class="bg-success">維修單基本資料</h2>
<table class="table">
	<tr>
		<td class="text-center">送修日期</td>
		<td><?=form_error('start_date')?>
		<?php $start_date = (validation_errors() != '') ? set_value('start_date') : $lists_id->start_date; ?>
		<?php
		$date_data = array (
			'name'	=>	'start_date',
			'id'	=>	'datepicker',
			'class'	=>	'form-control',
			'value'	=>	$start_date,
			'placeholder'	=> '選擇日期');
		echo form_input($date_data);
	?>
		</td>
		<td class="text-center"><div class="form-group"><?php
				if ($lists_id->repaired == '0') 
				{
					echo form_checkbox('repaired', '0', FALSE);
				}
				else
				{
					echo form_checkbox('repaired', '1', TRUE);
				}
				?>
		已完修</div></td>
		<td class="text-center">電話通知日期</td>
		<td>
				<?php $call_date = (validation_errors() != '') ? set_value('call_date') : $lists_id->call_date; ?>
		<?php
		$c_data = array (
			'name'	=> 'call_date',
			'id'	=> 'datepicker2',
			'class'	=>	'form-control',
			'value'	=>	$call_date);
		echo form_input($c_data);
			?>
		</td>

	</tr>
	<tr>
		<td class="text-center">手機號碼</td>
		<td><?=form_error('phone')?>
		<?php $phone = (validation_errors() != '') ? set_value('phone') : $lists_id->phone; ?>
		<?php
			$p_data = array (
			'name'	=> 'phone',
			'class'	=>	'form-control',
			'value'	=>	$phone);
		echo form_input($p_data);
		?>
		</td>
		<td class="text-center"><?php
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
		<td class="text-center">取回/不修理日期</td>
		<td>
				<?php $return_date = (validation_errors() != '') ? set_value('return_date') : $lists_id->return_date; ?>
		<?php
		$r_data = array (
			'name'	=> 'return_date',
			'id'	=> 'datepicker3',
			'class'	=>	'form-control',
			'value'	=>	$return_date);
		echo form_input($r_data);
			?>	
		</td>
	</tr>
	<tr>
		<td class="text-center">客戶姓名</td>
		<td><?=form_error('customer_name')?>
		<?php $customer_name = (validation_errors() != '') ? set_value('customer_name') : $lists_id->customer_name; ?>
		<?php
			$c_data = array (
			'name'	=> 'customer_name',
			'class'	=>	'form-control',
			'value'	=>	$customer_name);
		echo form_input($c_data);
		?>
		</td>
		<td class="text-center">維修價格</td>
		<td>		
		<?php $price = (validation_errors() != '') ? set_value('price') : $lists_id->price; ?>
		<?php
			$price_data = array (
			'name'	=> 'price',
			'class'	=>	'form-control',
			'value'	=>	$price);
		echo form_input($price_data);
		?></td>
		<td></td>

	</tr>
</table>
<table class="table">
	<tr>
		<td class="text-center">工具狀況</td>
		<td width="200px">
			<?php $tools_status = (validation_errors() != '') ? set_value('tools_status') : $lists_id->tools_status; ?>
		<?php
			$status_data = array (
			'name'	=> 'tools_status',
			'class'	=>	'form-control',
			'value'	=>	$tools_status);
		echo form_textarea($status_data);
		?>
		</td>
		<td class="text-center">修理工具<a href="<?=config_item('base_url');?>/index.php/Lists/collect_tool/<?=$lists_id->id?>" class="btn btn-primary">匯入工具描述</a></td>
		<td width="200px">
			<?php $tools_memo = (validation_errors() != '') ? set_value('tools_memo') : $lists_id->tools_memo; ?>
		<?php
			$tmemo_data = array (
			'name'	=> 'tools_memo',
			'class'	=>	'form-control',
			'value'	=>	$tools_memo);
		echo form_textarea($tmemo_data);
		?>
		</td>
		<td class="text-center">修理零件<a href="<?=config_item('base_url');?>/index.php/Lists/collect_parts/<?=$lists_id->id?>" class="btn btn-primary">匯入零件描述</a></td>
		<td width="200px">
			<?php $parts_memo = (validation_errors() != '') ? set_value('parts_memo') : $lists_id->parts_memo; ?>
			<?php
			$pmemo_data = array (
			'name'	=> 'parts_memo',
			'class'	=>	'form-control',
			'value'	=>	$parts_memo);
		echo form_textarea($pmemo_data);
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
    ?> ｜ <a href="<?=config_item('base_url');?>/index.php/Lists/" class="btn btn-primary" accesskey="l">回維修單列表</a>｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
    <hr>
<?php foreach ($tooltype as $row) : ?>
	<a href="<?=config_item('base_url');?>/index.php/Repair_tools/add_tool/<?=$lists_id->id?>/<?=$row->id?>" class="btn btn-success">新增｛<?=$row->type_name?>｝工具</a>
<?php endforeach; ?>
<?php
	if (empty($lists_tools)) 
	{
		echo '<h2 class="bg-info">尚未登記工具！</h2>'; 
	}
	else
	{
		echo '<h2  class="bg-success">維修工具列表</h2>';
	}
?>
<table class="table table-striped">
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
			<td><?=str_replace($orig_typeid, $rep_typeid, 'TYPE' . $trow->type_id); ?></td>
			<td><?=str_replace($orig_toolid, $rep_toolid, 'TOOL' . $trow->tool_id); ?></td>
			<td><?=$trow->tool_number ?></td>
			<td><a href="<?=config_item('base_url');?>/index.php/Repair_tools/modify/<?=$lists_id->id?>/<?=$trow->id?>/<?=$trow->type_id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Repair_tools/delete/<?=$lists_id->id?>/<?=$trow->id?>" class="btn btn-danger" onclick="return confirm('確定要刪除嗎？')">刪除</a> | <a href="<?=config_item('base_url');?>/index.php/Repair_tool_parts/add_part/<?=$lists_id->id?>/<?=$trow->id?>/<?=$trow->type_id?>" class="btn btn-primary">新增零件</a></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php
	if (empty($lists_parts)) 
	{
		echo '<h2 class="bg-info">尚未登記使用零件！</h2>'; 
	}
	else
	{
		echo '<h2 class="bg-success">維修使用零件列表</h2>';
	}
?>
<table class="table table-striped">
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
			<td><?=str_replace($orig_typeid, $rep_typeid, 'TYPE' . $prow->type_id); ?></td>
			<td><?=str_replace($orig_partid, $rep_partid, 'PART' . $prow->parts_id); ?></td>
			<td><?=$prow->price ?></td>
			<td><a href="<?=config_item('base_url');?>/index.php/Repair_tool_parts/modify/<?=$lists_id->id?>/<?=$prow->id?>/<?=$prow->type_id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Repair_tool_parts/delete/<?=$lists_id->id?>/<?=$prow->id?>" class="btn btn-danger" onclick="return confirm('確定要刪除嗎？')">刪除</a></td>
		</tr>
	<?php endforeach; ?>
<?=form_close()?>