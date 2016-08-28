    <div class="bg-primary"><h1>工作清單：<?=$choosed?></h1></div>
  <?=form_open($form)?>
    <div>
      <table class="table">
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
            <td><?=$row->call_date?></td>
            <td><?=$row->return_date?></td>
            <td><a href="<?=config_item('base_url');?>/index.php/Lists/modify/<?=$row->id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Lists/delete/<?=$row->id?>" class="btn btn-primary" onclick="return confirm('確定要刪除嗎？')">刪除</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php
    $but1 = array (
      'name'  =>  'sent',
      'type'  =>  'submit',
      'content' =>  '將標記項目設為已維修',
      'class' =>  'btn btn-primary');
    $but2 = array (
      'name'  =>  'reset',
      'type'  =>  'reset',
      'content' =>  '取消',
      'class' =>  'btn btn-primary');
    echo form_button($but1);
    echo form_button($but2);
    ?>
<?=form_close()?>
