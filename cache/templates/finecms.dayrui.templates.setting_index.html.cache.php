<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	<?php if ($result) { ?>
	dr_tips('<?php echo fc_lang('操作成功，正在刷新...'); ?>', 3, 1);
	<?php } ?>
});
</script>

<form class="form-horizontal" action="" method="post" id="myform" name="myform">
	<input name="page" id="mypage" type="hidden" value="<?php echo $page; ?>" />
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
		<small></small>
	</h3>

	<div class="portlet light bordered myfbody">
		<div class="portlet-title tabbable-line">
			<ul class="nav nav-tabs" style="float:left;">
				<li class="<?php if ($page==0) { ?>active<?php } ?>">
					<a href="#tab_0" data-toggle="tab" onclick="$('#mypage').val('0')"> <i class="fa fa-cog"></i> <?php echo fc_lang('基本设置'); ?> </a>
				</li>
				<li class="<?php if ($page==9) { ?>active<?php } ?>">
					<a href="#tab_9" data-toggle="tab" onclick="$('#mypage').val('9')"> <i class="fa fa-code"></i> UCSSO </a>
				</li>
			</ul>
		</div>
		<div class="portlet-body">
			<div class="tab-content">

				<div class="tab-pane  <?php if ($page==9) { ?>active<?php } ?>" id="tab_9">
					<div class="form-body">

						<div class="form-group">
							<label class="col-md-2 control-label">UCSSO：</label>
							<div class="col-md-9">
								<div class="radio-list">
									<label class="radio-inline"><input type="radio" name="data[ucsso]" value="1" <?php echo dr_set_radio('ucsso', $data['ucsso'], '1'); ?> /> <?php echo fc_lang('开启'); ?></label>
									<label class="radio-inline"><input type="radio" name="data[ucsso]" value="0" <?php echo dr_set_radio('ucsso', $data['ucsso'], '0', TRUE); ?> /> <?php echo fc_lang('关闭'); ?></label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">网站通信地址：</label>
							<div class="col-md-9">
								<label><input readonly class="form-control input-large" type="text" value="<?php echo trim(SITE_URL, '/'); ?>"/></label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">其他通信地址：</label>
							<div class="col-md-9">
								<label><textarea readonly style="height:80px" class="form-control input-large"><?php if (is_array($synurl)) { $count=count($synurl);foreach ($synurl as $url) {  if ($url != trim(SITE_URL, '/')) {  echo $url;  echo PHP_EOL;  }  } } ?></textarea></label>
								<span class="help-block">多站点或者绑定域名时，将这些URL复制到UCSSO中的“网站其他地址”中</span>

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">通信配置代码：</label>
							<div class="col-md-9">
								<textarea  style="height:180px" class="form-control" name="data[ucssocfg]"><?php echo $data['ucssocfg']; ?></textarea>
								<span class="help-block">通信配置代码复制到这里</span>

							</div>
						</div>

					</div>
				</div>



				<div class="tab-pane  <?php if ($page==0) { ?>active<?php } ?>" id="tab_0">
					<div class="form-body">


						<div class="form-group">
							<label class="col-md-2 control-label"><?php echo fc_lang('会员注册'); ?>：</label>
							<div class="col-md-9">
								<input type="checkbox" name="data[register]" value="1" <?php if ($data['register']) { ?>checked<?php } ?> data-on-text="<?php echo fc_lang('开启'); ?>" data-off-text="<?php echo fc_lang('关闭'); ?>" data-on-color="success" data-off-color="danger" class="make-switch" data-size="small">

							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label"><?php echo fc_lang('会员名规则（正则）'); ?>：</label>
							<div class="col-md-9">
								<label><input class="form-control" type="text" name="data[regnamerule]" id="dr_regnamerule" value="<?php echo $data['regnamerule']; ?>"/></label>
									<label><select class="form-control" onchange="javascript:$('#dr_regnamerule').val(this.value)" name="pattern_select">
									<option value=""><?php echo fc_lang('正则验证'); ?></option>
									<option value="/.*/"><?php echo fc_lang('不限制'); ?></option>
									<option value="/^[0-9.-]+$/"><?php echo fc_lang('数字'); ?></option>
									<option value="/^[0-9-]+$/"><?php echo fc_lang('整数'); ?></option>
									<option value="/^[a-z]+$/i"><?php echo fc_lang('字母'); ?></option>
									<option value="/^[0-9a-z]+$/i"><?php echo fc_lang('数字+字母'); ?></option>
									<option value="/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/">E-mail</option>
									<option value="/^[0-9]{5,20}$/">QQ</option>
									<option value="/^(1)[0-9]{10}$/"><?php echo fc_lang('手机号码'); ?></option>
									<option value="/^[0-9-]{6,13}$/"><?php echo fc_lang('电话号码'); ?></option>
									<option value="/^[0-9]{6}$/"><?php echo fc_lang('邮政编码'); ?></option>
								</select></label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"><?php echo fc_lang('不允许注册的会员名'); ?>：</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="data[regnotallow]" value="<?php echo $data['regnotallow']; ?>" >
								<span class="help-block"><?php echo fc_lang('多个会员名以分号“,”分隔'); ?></span>
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
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>