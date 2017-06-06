<?php if ($fn_include = $this->_include("install_header.html", "admin")) include($fn_include); ?>
<section class="section">
	<div class="step">
		<ul>
			<li class="on"><em>1</em>检测环境</li>
			<li class="on"><em>2</em>创建数据</li>
			<li class="current"><em>3</em>完成安装</li>
		</ul>
	</div>
	<div class="install" id="log">
		<ul id="loginner">
		</ul>
	</div>
	<div class="bottom tac">
		<a href="javascript:;" class="btn_old"><img src="<?php echo SITE_PATH; ?>statics/admin/images/install/loading.gif" align="absmiddle" />&nbsp;正在安装...</a>
	</div>
</section>
<script type="text/javascript">
var log = "<?php echo $log;?>";
var n = 0;
var timer = 0;
log = log.split('<finecms>');
function GoPlay(){
	if (n > log.length-1) {
		n=-1;
		clearIntervals();
	}
	if (n > -1) {
		postcheck(n);
		n++;
	}
}
function postcheck(n){
	document.getElementById('loginner').innerHTML += '<li><span class="correct_span">&radic;</span>创建数据表' + log[n] + '，完成</li>';
	document.getElementById('log').scrollTop = document.getElementById('log').scrollHeight;
}
function setIntervals(){
	timer = setInterval('GoPlay()',50);
}
function clearIntervals(){
	clearInterval(timer);
	window.location.href = "<?php echo dr_url('install/index', array('step'=>$step+1)); ?>";
}
setTimeout(setIntervals, 100);
</script>
<?php if ($fn_include = $this->_include("install_footer.html", "admin")) include($fn_include); ?>