<h1 class="bg-success">新增工具</h1>
<?=form_open('Repair_tools/add_tool/' . $lists_id . '/' . $tooltype->id);?>
<?php
        // 取出廠商代號轉換用字串陣列
      $orig_vid;
      $rep_vid;
     for ($j =0; $j < count($vendor); $j++)
    {
      $orig_vid[$j] = $vendor[$j]->id;
      $rep_vid[$j] = $vendor[$j]->v_name;
    }
?>
 <h2  class="bg-info">維修單編號：<?=$lists_id?></h2>
<table class="table">
	<div class="container-fluid">
	<tr><td>
	<div class="row">
	<div class="col-md-1">類別名稱</div>
	<div class="col-md-11"><?=$tooltype->type_name;?></div>
	</div>
	</td></tr>
	<tr><td>
	<div class="row">
	<div class="col-md-1">工具列表</div>
	<div class="col-md-11">
	<div class="row">
	<?php foreach ($tool_list as $row) : ?>
		<div class="col-md-4 panel panel-default">
		<div class="col-md-3">
	<div class="radio-inline">
				<div class="form-group">
				<?=form_radio('tool_id', $row->id, FALSE);?>
				<?=form_label($row->tool_name, 'tname');?>
				</div>
			</div></div>
			<div class="col-md-3"><?=str_replace($orig_vid, $rep_vid, $row->vendor); ?></div>
			</div>
	<?php endforeach; ?>
	</div>
	</div>		
	</div>
	</td></tr>
	<tr>
		<td>
			<div class="row">
				<div class="col-md-1">新增工具名稱</div>
				<div class="col-md-2">
					<div class="form-group">
					<?=form_radio('tool_id', '', FALSE);?>
					<?php
						$newtool_data = array (
						'name'	=> 'tool_name_new',
						'class'	=>	'form-control');
					echo form_input($newtool_data);
					?>
					</div>
				</div>
				<div class="col-md-1">廠牌</div>
				<div class="col-md-8">
				<div class="row">
					<?php

					foreach ($vendor as $row) {
					echo '<div class="col-md-3 panel panel-default">';
						if($row->id == 2)
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
					echo '</div>';
					}
					?>
					</div>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="row">
			<div class="col-md-1">工具數量</div>
			<div class="col-md-11">
			<div class="row">
			<div class="col-md-2">
				<?=form_error('tool_number')?>
				<?php
					$number_data = array (
					'name'	=> 'tool_number',
					'class'	=>	'form-control',
					'value'	=>	'1');
				echo form_input($number_data);
				?>
				</div>
			</div>
			</div>
	</div>
		</td>
	</tr>
	</div>
	
	</table>
    <?php
    $but1 = array (
      'name'  =>  'sent',
      'type'  =>  'submit',
      'content' =>  '送出',
      'class' =>  'btn btn-primary',
      'accesskey'	=>	's');
    echo form_button($but1);
    ?> ｜<a href="<?=config_item('base_url');?>/index.php/Lists/modify/<?=$lists_id;?>" class="btn btn-primary" accesskey="b">回維修單</a>｜ <a href="<?=config_item('base_url');?>/index.php/Lists/" class="btn btn-primary" accesskey="l">回維修單列表</a>｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>