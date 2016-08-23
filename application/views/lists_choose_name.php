<div class="bg-primary"><h1 >建立工作訂單 Step2 輸入送修人姓名</h1></div>
<?=form_open('Lists/choose_name');?>
<table class="table">
<tr>
	<td>送修日期</td>
	<td><?= echo $lists_date;?></td>
</tr>
<tr>
	<td>手機/電話號碼</td>
	<td><?= echo $lists_phone;?></td>
</tr>

</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>