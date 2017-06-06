<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	<?php if (IS_POST) { ?>
	dr_tips('<?php echo fc_lang('操作成功，正在刷新...'); ?>', 3, 1);
	<?php } ?>
});
</script>

<link href="<?php echo THEME_PATH; ?>admin/global/plugins/codemirror/theme/neat.css" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_PATH; ?>admin/global/plugins/codemirror/lib/codemirror.css" rel="stylesheet" type="text/css" />

<script src="<?php echo THEME_PATH; ?>admin/global/plugins/codemirror/lib/codemirror.js" type="text/javascript"></script>
<script src="<?php echo THEME_PATH; ?>admin/global/plugins/codemirror/mode/javascript/javascript.js" type="text/javascript"></script>
<script src="<?php echo THEME_PATH; ?>admin/global/plugins/codemirror/mode/htmlmixed/htmlmixed.js" type="text/javascript"></script>
<script src="<?php echo THEME_PATH; ?>admin/global/plugins/codemirror/mode/css/css.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		CodeMirror.fromTextArea(document.getElementById("system_file"), {
			lineNumbers: !0,
			matchBrackets: !0,
			styleActiveLine: !0,
			theme: "neat",
			mode: "javascript"
		})
	});
</script>
<div class="subnav">
	<div class="content-menu ib-a blue line-x">
		<?php echo $menu; ?>

	</div>
	<div class="bk10"></div>
	<div class="table-list">
		<form action="" method="post" name="myform" id="myform">
        	<div class="explain-col">
                <font color="gray"><?php echo fc_lang('当前目录'); ?>：<?php echo str_replace(WEBPATH, '/', $path); ?></font>
            </div>
            <div class="bk10"></div>
			<textarea name="code" id="system_file" style="height:450px;width:99%;"><?php echo $body; ?></textarea>
			<?php if ($is_name) { ?>
			<div class="bk10"></div>
			<input style=" margin-top: 20px" class="input-text" type="text" placeholder="<?php echo fc_lang('文件别名'); ?>" name="name" value="<?php echo $name; ?>" size="50" />
			<?php } ?>
			<div class="bk10"></div>
			<input type="submit" class="button pt" name="dosubmit" value="<?php echo fc_lang('保存'); ?>" />
			<input type="button" class="button pt" name="button" onclick="window.location.href='<?php echo $back; ?>'" value="<?php echo fc_lang('返回'); ?>" />
		</form>
	</div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>