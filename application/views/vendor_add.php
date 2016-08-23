<h1>新增廠牌名稱</h1>
<?=form_open('Vendor/add');?>
<table>
  <tr>
    <td>廠牌名稱</td>
    <td><?=form_error('v_name')?>
    <?=form_input('v_name', set_value('v_name'))?></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>