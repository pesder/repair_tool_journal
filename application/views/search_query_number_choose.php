<?=form_open('Search/query_number');?>
<table class="table">
<tr>
	<td>依電話查詢</td>
	<td><?=form_error('phone')?>
	<?=form_input('phone', set_value('phone'))?>
	</td>
</tr>
</table>
<?=form_submit('send', '送出')?>
<?=form_reset('reset', '取消')?>
<?=form_close()?>