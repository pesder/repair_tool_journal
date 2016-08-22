    <div class="bg-primary"><h1>廠牌名稱</h1></div>
    <div ><a href="<?=config_item('base_url');?>/index.php/Vendor/add" class="btn btn-primary">新增廠牌名稱</a></div>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th>編號</th>
            <th>廠牌</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($vendor as $row): ?>
          <tr>
            <td><?=$row->id?></td>
            <td><?=$row->v_name?></td>
            <td><a href="<?=config_item('base_url');?>/index.php/Vendor/modify/<?=$row->id?>" class="btn btn-primary">修改</a> | <a href="<?=config_item('base_url');?>/index.php/Vendor/delete/<?=$row->id?>" class="btn btn-primary" onclick="return confirm('確定要刪除嗎？')">刪除</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

