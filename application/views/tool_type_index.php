    <h1 class="bg-warning text-center">工具種類</h1>
    <div ><a href="<?=config_item('base_url');?>/index.php/Tool_type/add" class="btn btn-primary">新增工具種類</a></div>
    <div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>編號</th>
            <th>種類</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tool_type as $row): ?>
          <tr>
            <td><?=$row->id?></td>
            <td><?=$row->type_name?></td>
            <td><a href="<?=config_item('base_url');?>/index.php/Tool_type/modify/<?=$row->id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Tool_type/delete/<?=$row->id?>" class="btn btn-danger" onclick="return confirm('確定要刪除嗎？')">刪除</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
<a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
