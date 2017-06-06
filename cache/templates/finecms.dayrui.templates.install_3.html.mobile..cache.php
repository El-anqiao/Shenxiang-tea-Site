<?php if ($fn_include = $this->_include("install_header.html", "admin")) include($fn_include); ?>  
<section class="section">
	<div class="step">
		<ul>
			<li class="on"><em>1</em>检测环境</li>
			<li class="current"><em>2</em>创建数据</li>
			<li><em>3</em>完成安装</li>
		</ul>
	</div>
	<form id="J_install_form" action="<?php echo dr_url('install/index', array('step'=>$step)); ?>" method="post" onsubmit="return installSubmit()">
	<div class="server">
		<table width="100%">
			<tr>
				<td class="td1" width="100">数据库信息</td>
				<td class="td1" width="200">&nbsp;</td>
				<td class="td1">&nbsp;</td>
			</tr>
			<tr>
				<td class="tar">数据库服务器：</td>
				<td><input type="text" name="data[dbhost]" value="localhost" class="input" /></td>
				<td><div id="J_install_tip_dbhost"><span class="gray">数据库服务器地址，一般为localhost</span></div></td>
			</tr>

			<tr>
				<td class="tar">数据库用户名：</td>
				<td><input type="text" name="data[dbuser]" value="root" class="input" /></td>
				<td><div id="J_install_tip_dbuser"></div></td>
			</tr>
			<tr>
				<td class="tar">数据库密码：</td>
				<td><input type="text" name="data[dbpw]" value="" class="input" autoComplete="off" /></td>
				<td><div id="J_install_tip_dbpw"></div></td>
			</tr>
			<tr>
				<td class="tar">数据库名：</td>
				<td><input type="text" name="data[dbname]" value="" class="input" /></td>
				<td><div id="J_install_tip_dbname"></div></td>
			</tr>
			<tr>
				<td class="tar">数据库表前缀：</td>
				<td><input type="text" name="data[dbprefix]" value="fn_" class="input"></td>
				<td><div id="J_install_tip_dbprefix"><span class="gray">建议使用默认，同一数据库安装多个FineCMS时需修改</span></div></td>
			</tr>
		</table>
		<div id="J_response_tips" style="display:none;"></div>
	</div>
	<div class="bottom tac">
		<a href="<?php echo dr_url('install/index', array('step'=>$step-1)); ?>" class="btn">上一步</a>
        <button type="submit" class="btn btn_submit J_install_btn">创建数据</button>
	</div>
</form>
</section>
<div  style="width:0;height:0;overflow:hidden;">
	<img src="<?php echo SITE_PATH; ?>statics/admin/images/install/pop_loading.gif">
</div>
<script type="text/javascript">
function installSubmit() {
	var install_form = $("#J_install_form");
	var response_tips = $('#J_response_tips'); //后端返回提示
	var _data = $("#J_install_form").serialize();
	response_tips.html('<div class="loading"><span>请稍后...</span></div>').show();
	$.ajax({
		type: "POST",
		url: "<?php echo dr_url('install/index', array('step'=>$step)); ?>",
		data: _data,
		dataType: "json",
		success: function (data) {
			if(data.status == 1) {
				window.location.href = data.code;
			} else {
				response_tips.html('<span class="tips_error">' + data.code + '</span>').show();
			}
		},
		error: function(HttpRequest, ajaxOptions, thrownError) {
			alert(HttpRequest.responseText);
		}
	});
	return false;
}
</script>
<?php if ($fn_include = $this->_include("install_footer.html", "admin")) include($fn_include); ?>