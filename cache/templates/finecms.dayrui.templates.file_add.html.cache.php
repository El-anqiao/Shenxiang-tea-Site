<script type="text/javascript">
$(function() { //防止回车提交表单
	document.onkeydown = function(e){ 
		var ev = document.all ? window.event : e;
		if (ev.keyCode==13) $("#mark").val("1"); // 标识不能提交表单
	}
});
function dr_form_check() {
	if ($("#mark").val() == 0) { 
		return true;
	} else {
		return false;
	}
}

</script>
<div class="table-list" style="">
<form action="" method="post" id="myform" name="myform" onsubmit="return dr_form_check()">
<input name="mark" id="mark" type="hidden" value="0">
<table width="100%" class="table_form">
<tr>
    <th width="120"><font color="red">*</font>&nbsp;<?php echo fc_lang('文件/目录名称'); ?>： </th>
    <td><input class="input-text" type="text" name="file" id="dr_file" value="<?php echo $file; ?>" size="20" /></td>
</tr>
<tr>
    <td colspan="2" style="border:none;color:#999"><span id="dr_file_tips"><?php echo fc_lang('如果不填写扩展名（html,js,css）表示创建目录（禁止中文目录）'); ?></span>&nbsp;&nbsp;</td>
</tr>
</table>

</form>
</div>