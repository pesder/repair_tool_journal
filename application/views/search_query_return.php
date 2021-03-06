<h1 class="bg-info">工作清單：<?=$choosed?></h1>
  <?=form_open($form)?>
    <div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>選取</th>
            <th>日期</th>
            <th>手機</th>
            <th>姓名</th>
            <th>維修物品</th>
            <th>維修零件</th>
            <th>維修金額</th>
            <th>通知日期</th>
            <th>領回日期</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($lists as $row): ?>
          <tr>
            <td><?=form_checkbox('checked[]', $row->id, FALSE);?></td>
            <td><?=$row->start_date?></td>
            <td><?=$row->phone?></td>
            <td><?=$row->customer_name?></td>
            <td><?=$row->tools_memo?></td>
            <td><?=$row->parts_memo?></td>
            <td><?=$row->price?></td>
            <td><?=str_replace('0000-00-00', 'N/A', $row->call_date)?></td>
            <td><?=str_replace('0000-00-00', 'N/A', $row->return_date)?></td>
            <td><a href="<?=config_item('base_url');?>/index.php/Lists/modify/<?=$row->id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Lists/delete/<?=$row->id?>" class="btn btn-danger" onclick="return confirm('確定要刪除嗎？')">刪除</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="form-group">
    <?=form_label('使用此日期：', 's_date')?>
    <?php
      $c_data = array (
        'name'  => 'return_date',
        'id'  => 'datepicker',
        'class' =>  'form-control',
        'value' =>  date("Y-m-d"));
    echo form_input($c_data);
      ?>
    </div>
    <?php
    $but1 = array (
      'name'  =>  'sent',
      'type'  =>  'submit',
      'content' =>  '送出',
      'class' =>  'btn btn-primary',
      'accesskey' =>  's');
    echo form_button($but1);
    ?> ｜ 
    <a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
<?=form_close()?>
