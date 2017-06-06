<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	$(".table-list td").last().css('border-bottom','1px solid #EEEEEE');
});
function dr_copy_module(url) {
	var throughBox = $.dialog.through;
	var dr_Dialog = throughBox({title: "<?php echo fc_lang('创建模型'); ?>"});
	$.ajax({type: "GET", url:url, dataType:'text', success: function (text) {
			var win = $.dialog.top;
			dr_Dialog.content(text);
			dr_Dialog.button({name: "<?php echo fc_lang('创建'); ?>", callback:function() {
					win.$("#mark").val("0"); // 标示可以提交表单
					if (win.dr_form_check()) { // 按钮返回验证表单函数
						var _data = win.$("#myform").serialize();
						$.ajax({type: "POST",dataType:"json", url: url, data: _data, // 将表单数据ajax提交验证
							success: function(data) {
								if (data.status == 1) {
									dr_tips(data.code, 3, 1); 
									setTimeout("window.location.reload(true)", 3000);
								} else {
									dr_tips(data.code, 5); 
									return true;
								}
							},
							error: function(HttpRequest, ajaxOptions, thrownError) {
								alert(HttpRequest.responseText);
							}
						});
					}
					return false;
				},
				focus: true
			});
	    },
	    error: function(HttpRequest, ajaxOptions, thrownError) {
			alert(HttpRequest.responseText);
		}
	});
}
</script>
<style>
.dr_none td {background-color: #f8f8f8;}
</style>
<div class="page-bar">
	<ul class="page-breadcrumb mylink">
		<?php echo $menu['link']; ?>
		<li> <a href="javascript:dr_copy_module('<?php echo dr_url('module/add'); ?>');"><i class="fa fa-plus"></i> <?php echo fc_lang('创建模型'); ?></a> <i class="fa fa-circle"></i> </li>

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

<form class="form-horizontal" action="" method="post" id="myform" name="myform">
	<div class="portlet mylistbody">
		<div class="portlet-body">
			<div class="table-scrollable">

				<table class="mytable table table-striped table-bordered table-hover table-checkable dataTable">

					<thead>
					<tr>
						<th width="50" align="center"><?php echo fc_lang('可用'); ?></th>
						<th width="120" align="left"><?php echo fc_lang('名称'); ?></th>
						<th width="90" align="left"><?php echo fc_lang('表名'); ?></th>
						<th align="left" class="dr_option"><?php echo fc_lang('操作'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php if (is_array($list)) { $count=count($list);foreach ($list as $dir=>$t) { ?>
					<tr>
						<td align="center"><?php if (1) { ?><a href="javascript:;" onClick="return dr_dialog_set('<?php echo $t['disabled'] ? fc_lang('<font color=blue><b>你确定要启用它？启用后将正常使用</b></font>') : fc_lang('<font color=red><b>你确定要禁用它？禁用后将无法使用</b></font>'); ?>','<?php echo dr_url('module/disabled',array('id'=>$t['id'])); ?>');"><img src="<?php echo THEME_PATH; ?>admin/images/<?php echo $t['disabled'] ? 0 : 1 ?>.gif"></a><?php } else { ?><img src="<?php echo THEME_PATH; ?>admin/images/<?php echo $t['disabled'] ? 0 : 1 ?>.gif"></a><?php } ?></td>
						<td align="left"><?php echo $t['site']['name']; ?></td>
						<td align="left"><?php echo $dir; ?></td>
						<td align="left" class="dr_option">

								<a class="ago" href="<?php echo dr_url('module/config',array('id'=>$t['id'], 'all' => 1)); ?>"> <i class="fa fa-cog"></i> <?php echo fc_lang('配置'); ?></a>

								<a class="aadd" href="<?php echo $duri->uri2url('admin/field/index/rname/module/rid/'.$t['id']); ?>"> <i class="fa fa-plus-square"></i> <?php echo fc_lang('自定义字段'); ?></a>
								<a class="adel" href="javascript:;" onClick="return dr_confirm_url('<font color=red><b><?php echo fc_lang('该操作将会删除全部站点中的模型内容数据，您确定吗？'); ?></b></font>','<?php echo dr_url('module/uninstall',array('id'=>$t['id'])); ?>');"> <i class="fa fa-trash"></i> <?php echo fc_lang('删除'); ?></a>

						</td>
					</tr>
					<?php } } ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</form>
<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>