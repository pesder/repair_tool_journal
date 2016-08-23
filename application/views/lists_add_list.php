<div class="bg-primary"><h1 >建立工作訂單 Step1 輸入日期與手機</h1></div>
<?=form_open('Lists/add_list');?>
<table class="table">
<tr>
	<td>送修日期</td>
	<td><input type="text" id="datepicker" placeholder="選擇日期" name="start_date"/></td>
</tr>
<tr>
	<td>手機/電話號碼</td>
	<td>
		<?=form_error('phone')?>
		<?=form_input('phone', set_value('phone'))?>
	</td>
</tr>

</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>