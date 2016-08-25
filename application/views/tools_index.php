    <div class="bg-primary"><h1 >工具列表</h1></div>
    <div ><a href="<?=config_item('base_url');?>/index.php/Tools/add" class="btn btn-primary">新增工具</a></div>
    <?php
    // 取出工具種類代號轉換用字串陣列
      $orig_typeid;
      $rep_typeid;
     for ($i =0; $i < count($tooltype); $i++)
    {
      $orig_typeid[$i] = 'P' . $tooltype[$i]->id;
      $rep_typeid[$i] = $tooltype[$i]->type_name;
    }
        // 取出廠商代號轉換用字串陣列
      $orig_vid;
      $rep_vid;
     for ($j =0; $j < count($vendor); $j++)
    {
      $orig_vid[$j] = 'V' . $vendor[$j]->id;
      $rep_vid[$j] = $vendor[$j]->v_name;
    }
    ?>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th>編號</th>
            <th>種類</th>
            <th>工具名稱</th>
            <th>廠牌</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tools as $row): ?>
          <tr>
            <td><?=$row->id?></td>
            <td><?=str_replace($orig_typeid, $rep_typeid, 'P' . $row->type)?></td>
            <td><?=$row->tool_name?></td>
            <td><?=str_replace($orig_vid, $rep_vid, 'V' . $row->vendor)?></td>
            <td><a href="<?=config_item('base_url');?>/index.php/Tools/modify/<?=$row->id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Tools/delete/<?=$row->id?>" class="btn btn-primary" onclick="return confirm('確定要刪除嗎？')">刪除</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

