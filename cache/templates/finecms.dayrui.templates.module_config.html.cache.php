<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script type="text/javascript">
    $(function() {
        dr_theme(<?php echo $is_theme; ?>);
    });
    function dr_theme(id) {
        if (id == 1) {
            $("#dr_theme_html").html($("#dr_web").html());
        } else {
            $("#dr_theme_html").html($("#dr_local").html());
        }
    }
</script>
<div id="dr_local" style="display: none">
	<label class="col-md-2 control-label"><?php echo fc_lang('主题风格'); ?>：</label>
	<div class="col-md-9">
		<label><select class="form-control" name="data[theme]">
			<option value="default"> -- </option>
			<?php if (is_array($theme)) { $count=count($theme);foreach ($theme as $t) { ?>
			<option<?php if ($t==$data['site'][$sid]['theme']) { ?> selected=""<?php } ?> value="<?php echo $t; ?>"><?php echo $t; ?></option>
			<?php } } ?>
		</select></label>
		<span class="help-block"><?php echo fc_lang('位于网站主站根目录下：根目录/statics/风格名称/'); ?></span>
	</div>
</div>
<div id="dr_web" style="display: none">
	<label class="col-md-2 control-label"><?php echo fc_lang('远程资源'); ?>：</label>
	<div class="col-md-9">
		<input class="form-control  input-xlarge" type="text" placeholder="http://" name="data[theme]" value="<?php echo strpos($data['site'][$sid]['theme'], 'http') === 0 ? $data['site'][$sid]['theme'] : ''; ?>">
		<span class="help-block"><?php echo fc_lang('网站将调用此地址的css,js,图片等静态资源'); ?></span>
	</div>
</div>
<div class="page-bar">
	<ul class="page-breadcrumb mylink">
		<?php echo $menu['link']; ?>

	</ul>
	<ul class="page-breadcrumb myname">
		<?php echo $menu['name']; ?>
	</ul>
	<div class="page-toolbar">
		<div class="btn-group pull-right">
			<button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-hover="dropdown"> <?php echo fc_lang('操作菜单'); ?>
				<i class="fa fa-angle-down"></i>
			</button>
			<ul class="dropdown-menu pull-right" role="menu">
				<?php if (is_array($menu['quick'])) { $count=count($menu['quick']);foreach ($menu['quick'] as $t) { ?>
				<li>
					<a href="<?php echo $t['url']; ?>"><?php echo $t['icon'];  echo $t['name']; ?></a>
				</li>
				<?php } } ?>
				<li class="divider"> </li>
				<li>
					<a href="javascript:window.location.reload();">
						<i class="icon-refresh"></i> <?php echo fc_lang('刷新页面'); ?></a>
				</li>
			</ul>
		</div>
	</div>
</div>
<h3 class="page-title">
	<small> </small>
</h3>

<form class="form-horizontal" action="" method="post" id="myform" name="myform">
	<div class="portlet light bordered myfbody">
		<div class="portlet-title tabbable-line">
			<ul class="nav nav-tabs" style="float:left;">
				<li class="active">
					<a href="#tab_0" data-toggle="tab"> <i class="fa fa-cog"></i> <?php echo fc_lang('模块配置'); ?> </a>
				</li>

			</ul>
		</div>
		<div class="portlet-body">
			<div class="tab-content">

				<div class="tab-pane active" id="tab_0">

				<div class="form-body">

					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo fc_lang('模块名称'); ?>：</label>
						<div class="col-md-9">
							<label>
								<input class="form-control" name="site[name]" value="<?php echo $data['site']['name']; ?>">
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo fc_lang('URL规则'); ?>：</label>
						<div class="col-md-9">
							<label>
								<select class="form-control" name="site[urlrule]">
									<option value="0"> -- </option>
									<?php $rt_u = $this->list_tag("action=cache name=urlrule  return=u"); if ($rt_u) extract($rt_u); $count_u=count($return_u); if (is_array($return_u)) { foreach ($return_u as $key_u=>$u) {  if ($u['type']==2) { ?><option value="<?php echo $u['id']; ?>" <?php if ($u['id']==$data['site']['urlrule']) { ?>selected<?php } ?>> <?php echo $u['name']; ?> </option><?php }  } } ?>
								</select>
							</label>
							<label>&nbsp;&nbsp;<a href="<?php echo dr_url('urlrule/index'); ?>" style="color:blue !important"><?php echo fc_lang('[URL规则管理]'); ?></a></label>
						</div>
					</div>

					<?php !$data['site']['search_title'] && $data['site']['search_title'] = '[第{page}页{join}][{keyword}{join}][{param}{join}]{modulename}{join}{'.'SITE_NAME}';?>

					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo fc_lang('搜索标题'); ?>：</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="site[search_title]" value="<?php echo $data['site']['search_title']; ?>" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo fc_lang('搜索关键字'); ?>：</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="site[search_keywords]" value="<?php echo $data['site']['search_keywords']; ?>" >
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label"><?php echo fc_lang('搜索描述信息'); ?>：</label>
						<div class="col-md-9">
							<input class="form-control" type="text" name="site[search_description]" value="<?php echo $data['site']['search_description']; ?>" >
						</div>
					</div>


				</div>
			</div>

		</div>
	</div>
	</div>

	<div class="myfooter">
		<div class="row">
			<div class="portlet-body form">
				<div class="form-body">
					<div class="form-actions">
						<div class="row">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn green"> <i class="fa fa-save"></i> <?php echo fc_lang('保存'); ?></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>