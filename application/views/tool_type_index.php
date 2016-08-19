    <div class="bg-primary"><h1 >工具種類</h1></div>
    <div ><a href="<?=config_item('base_url');?>/index.php/Tool_type/add" class="btn btn-primary">新增工具種類</a></div>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th>編號</th>
            <th>種類</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tooltype as $row): ?>
          <tr>
            <td><?=$row->id?></td>
            <td><?=$row->type_name?></td>
            <td><a href="<?=config_item('base_url');?>/index.php/Lists/modify/<?=$row->id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Lists/delete/<?=$row->id?>" class="btn btn-primary" onclick="return confirm('確定要刪除嗎？')">刪除</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

