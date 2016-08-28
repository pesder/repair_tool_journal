    <h1 class="bg-warning text-center">零件列表</h1>
    <div ><a href="<?=config_item('base_url');?>/index.php/Parts/add" class="btn btn-primary">新增零件</a></div>
    <?php
    // 取出零件種類代號轉換用字串陣列
      $orig_typeid;
      $rep_typeid;
     for ($i =0; $i < count($tooltype); $i++)
    {
      $orig_typeid[$i] = 'PART' . $tooltype[$i]->id;
      $rep_typeid[$i] = $tooltype[$i]->type_name;
    }

    ?>
    <div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>編號</th>
            <th>種類</th>
            <th>零件名稱</th>

            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($parts as $row): ?>
          <tr>
            <td><?=$row->id?></td>
            <td><?=str_replace($orig_typeid, $rep_typeid, 'PART' . $row->type)?></td>
            <td><?=$row->p_name?></td>

            <td><a href="<?=config_item('base_url');?>/index.php/Parts/modify/<?=$row->id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Parts/delete/<?=$row->id?>" class="btn btn-danger" onclick="return confirm('確定要刪除嗎？')">刪除</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
<a href="<?=config_item('base_url');?>/index.php/Control/" class="btn btn-primary" accesskey="h">回主選單</a>
