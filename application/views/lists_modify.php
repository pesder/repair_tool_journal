<h1>修改維修單</h1>
<?=form_open('Lists/modify/' . $lists_id)?>
<?php
    // 取出工具種類代號轉換用字串陣列
      $orig_toolid;
      $rep_toolid;
     for ($i =0; $i < count($tooltype); $i++)
    {
      $orig_typeid[$i] = $tooltype[$i]->id;
      $rep_typeid[$i] = $tooltype[$i]->type_name;
    }
?>
<h2>維修單基本資料</h2>
<table class="table">
	<tr>
		<td>送修日期</td>
		<td><?=form_error('start_date')?>
		<?php $start_date = (validation_errors() != '') ? set_value('start_date') : $lists_id->start_date; ?>
		<?=form_input('start_date', $start_date)?></td>
	</tr>
	<tr>
		<td>手機號碼</td>
		<td><?=form_error('phone')?>
		<?php $phone = (validation_errors() != '') ? set_value('phone') : $lists_id->phone; ?>
		<?=form_input('phone', $phone)?></td>
	</tr>
	<tr>
		<td>客戶姓名</td>
		<td><?=form_error('customer_name')?>
		<?php $customer_name = (validation_errors() != '') ? set_value('customer_name') : $lists_id->customer_name; ?>
		<?=form_input('customer_name', $customer_name)?></td>
	</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?php foreach ($tooltype as $row) : ?>
	<a href="<?=config_item('base_url');?>/index.php/Repair_tools/add_tool/<?=$lists_id?>/<?=$row->id?>" class="btn btn-primary">新增｛<?=$row->type_name?>｝</a>
<?php endforeach; ?>
<table class="table">
	<?php foreach ($lists_tools as $row) : ?>
		
	<?php endforeach; ?>
</table>
<?=form_close()?>