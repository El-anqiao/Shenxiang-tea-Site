<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
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
	<small><?php echo fc_lang('联动菜单可以作为地区菜单、类型菜单等等，也可以按站点来设置联动菜单值'); ?></small>
</h3>
<form action="" method="post" name="myform" id="myform">
<div class="portlet mylistbody">
	<div class="portlet-body">
		<div class="table-scrollable" style="overflow-y:initial;overflow-x:initial">

			<table class="mytable table table-striped table-bordered table-hover table-checkable dataTable">

		<thead>
		<tr>
			<th width="20"></th>
			<th width="40">Id</th>
			<th><?php echo fc_lang('名称'); ?></th>
			<th><?php echo fc_lang('标识代码'); ?></th>
			<th><?php echo fc_lang('类型'); ?></th>
			<th class="dr_option"><?php echo fc_lang('操作'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
		<tr>
			<td><input name="ids[]" type="checkbox" class="dr_select toggle md-check" value="<?php echo $t['id']; ?>" /></td>
			<td><?php echo $t['id']; ?></td>
			<td><?php echo $t['name']; ?></td>
			<td><?php echo $t['code']; ?></td>
			<td><?php if ($t['type']) {  echo fc_lang('站点独立');  } else {  echo fc_lang('全局共享');  } ?></td>
			<td class="dr_option">
			<?php if ($this->ci->is_auth('admin/linkage/edit')) { ?><a class="aedit" href="<?php echo dr_dialog_url(dr_url('linkage/edit',array('id'=>$t['id'])), 'edit'); ?>"> <i class="fa fa-edit"></i> <?php echo fc_lang('修改'); ?></a><?php }  if ($this->ci->is_auth('admin/linkage/data')) { ?><a class="alist" href="<?php echo dr_url('linkage/data',array('key'=>$t['id'])); ?>"> <i class="fa fa-navicon"></i> <?php echo fc_lang('联动菜单数据'); ?></a><?php }  if ($this->ci->is_auth('admin/linkage/add')) { ?>
				<label>
					<div class="btn-group">
						<button type="button" class="btn red btn-xs dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> <i class="fa fa-sign-in"></i> <?php echo fc_lang('常用数据导入'); ?>
							<i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu" role="menu">
							<?php if (is_array($dt_data)) { $count=count($dt_data);foreach ($dt_data as $i=>$n) { ?>
							<li><a style="margin-right:0px; padding: 8px !important;" href="javascript:" onClick="return dr_confirm_url('<font color=red><b><?php echo fc_lang('该操作将会现有的菜单覆盖掉，您确定吗？'); ?></b></font>','<?php echo dr_url('linkage/import'); ?>&id=<?php echo $i; ?>&lid=<?php echo $t['id']; ?>');"> <?php echo fc_lang($n); ?></a></li>
							<?php } } ?>
						</ul>
					</div>
				</label>
				<?php } ?>
			</td>
		</tr>
		<?php } } ?>
		<tr class="mtable_bottom">
			<th><input name="dr_select" class="toggle md-check" id="dr_select" type="checkbox" onClick="dr_selected()" /></th>
			<td colspan="62">
			<?php if ($this->ci->is_auth('admin/linkage/del')) { ?>
				<button type="button" class="btn red btn-sm" name="option" onClick="dr_confirm_del_all()"><i class="fa fa-trash"></i> <?php echo fc_lang('删除'); ?></button><?php } ?>
			</td>
		</tr>
		</tbody>
		</table>
		</div>
	</div>
</div>
</form>
<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>