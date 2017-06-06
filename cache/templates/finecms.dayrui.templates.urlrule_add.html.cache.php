<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	dr_set_type(<?php echo intval($data['type']); ?>);
});
function dr_set_type(id) {
	<?php if (is_array($type)) { $count=count($type);foreach ($type as $i=>$n) { ?>
	$('.dr_type_<?php echo $i; ?>').hide();
	<?php } } ?>
	$('.dr_type_'+id).show();
}
</script>
<form class="form-horizontal" action="" method="post" id="myform" name="myform">
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
	<small><?php echo fc_lang('通过URL规则可以对URL地址进行个性化设置！'); ?></small>
</h3>
<div class="portlet light bordered" style="margin-top:30px;margin-bottom: 70px;">
	<div class="portlet-title">
		<div class="caption">
			<span class="caption-subject font-green sbold uppercase"><?php echo fc_lang('URL规则'); ?></span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="form-body">
			<div class="form-group">
				<label class="col-md-2 control-label" style="padding-top: 10px"><?php echo fc_lang('类型'); ?>：</label>
				<div class="col-md-9">
					<div class="radio-list">
						<?php if (is_array($type)) { $count=count($type);foreach ($type as $i=>$n) { ?>
						<label class="radio-inline"><input type="radio" name="type" onclick="dr_set_type(<?php echo $i; ?>)" value="<?php echo $i; ?>" <?php if ((int)$data['type'] == $i) { ?>checked<?php } ?> /> <?php echo $n; ?></label>
						<?php } } ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label"><?php echo fc_lang('名称'); ?>：</label>
				<div class="col-md-9">
					<label><input type="text" class="form-control input-xlarge" name="name" value="<?php echo $data['name']; ?>" ></label>
					<span class="help-block"> <?php echo fc_lang('给它一个描述名称'); ?> </span>
				</div>
			</div>


			<!--栏目-->
			<div class="form-group dr_type_3">
				<label class="col-md-2 control-label"><?php echo fc_lang('列表(或单页)'); ?>：</label>
				<div class="col-md-9">
							<?php echo dr_field_input('share_list', 'Text', array('option' => array('width' => '100%')), $data['value']['share_list']); ?>

					<span class="help-block"> <?php echo fc_lang('栏目封面地址: index.php?c=category&id=ID'); ?> </span>
				</div>
			</div>
			<div class="form-group dr_type_3">
				<label class="col-md-2 control-label"><?php echo fc_lang('列表(或单页)分页'); ?>：</label>
				<div class="col-md-9">
							<?php echo dr_field_input('share_list_page', 'Text', array('option' => array('width' => '100%')), $data['value']['share_list_page']); ?>

					<span class="help-block"> <?php echo fc_lang('栏目列表地址: index.php?c=category&id=ID&page=分页号'); ?> </span>
				</div>
			</div>
			<div class="form-group dr_type_3">
				<label class="col-md-2 control-label"><?php echo fc_lang('内容规则'); ?>：</label>
				<div class="col-md-9">
							<?php echo dr_field_input('share_show', 'Text', array('option' => array('width' => '100%')), $data['value']['share_show']); ?>

					<span class="help-block"> <?php echo fc_lang('模型内容地址: index.php?c=show&id=ID'); ?> </span>
				</div>
			</div>
			<div class="form-group dr_type_3">
				<label class="col-md-2 control-label"><?php echo fc_lang('内容分页'); ?>：</label>
				<div class="col-md-9">
							<?php echo dr_field_input('share_show_page', 'Text', array('option' => array('width' => '100%')), $data['value']['share_show_page']); ?>

					<span class="help-block"> <?php echo fc_lang('模型内容分页地址: index.php?c=show&id=ID&page=分页号'); ?> </span>
				</div>
			</div>

			<!--站点URL-->
			<div class="form-group dr_type_4">
				<label class="col-md-2 control-label"><?php echo fc_lang('内容模型搜索页'); ?>：</label>
				<div class="col-md-9">
							<?php echo dr_field_input('share_search_page', 'Text', array('option' => array('width' => '100%')), $data['value']['share_search_page']); ?>

					<span class="help-block"> <?php echo fc_lang('内容模型搜索分页地址: index.php?c=search&各种参数字符串'); ?> </span>
				</div>
			</div>


			<div class="form-group dr_type_4">
				<label class="col-md-2 control-label"><?php echo fc_lang('关键词库'); ?>：</label>
				<div class="col-md-9">
							<?php echo dr_field_input('tags', 'Text', array('option' => array('width' => '100%')), $data['value']['tags']); ?>

					<span class="help-block"> <?php echo fc_lang('关键词库地址: index.php?c=tag&name=tag名称  ({tag}表示tag名称,不可缺少)'); ?> </span>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-2 control-label"><?php echo fc_lang('连接符号'); ?>：</label>
				<div class="col-md-9">
					<label><?php echo dr_field_input('catjoin', 'Text', array('option' => array('width' => '100%')), $data['value']['catjoin'] ? $data['value']['catjoin'] : '/'); ?></label>
					<span class="help-block"> <?php echo fc_lang('针对{pdirname}的连接符号，默认为"/"，如：china[连接符号]news'); ?> </span>
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