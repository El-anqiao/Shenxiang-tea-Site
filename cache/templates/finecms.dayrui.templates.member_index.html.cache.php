<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include);  $_pages=$pages; ?>
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


<div class="mytopsearch">
	<form method="post" action="" name="searchform" id="searchform">

		<label>
			<select class="form-control" name="data[field]">
				<?php if (is_array($field)) { $count=count($field);foreach ($field as $t) { ?>
				<option value="<?php echo $t['fieldname']; ?>" <?php if ($param['field']==$t['fieldname']) { ?>selected<?php } ?>><?php echo $t['name']; ?></option>
				<?php } } ?>
				<option value="uid" <?php if ($param['field']=='uid') { ?>selected<?php } ?>>uid</option>
			</select>
		</label>
		<label><input type="text" class="form-control" value="<?php echo $param['keyword']; ?>" placeholder="<?php echo fc_lang('多个Id可以用“,”分隔'); ?>" name="data[keyword]" /></label>
		<label><button type="submit" class="btn green btn-sm"> <i class="fa fa-search"></i> <?php echo fc_lang('搜索'); ?></button></label>
	</form>
</div>

<form action="" method="post" name="myform" id="myform">
	<input name="action" id="action" type="hidden" value="del" />
	<div class="portlet mylistbody">
		<div class="portlet-body">
			<div class="table-scrollable">

				<table class="mytable table table-striped table-bordered table-hover table-checkable dataTable">

		<thead>
		<tr>
			<th width="10"></th>
			<th>Uid</th>
			<th class="<?php echo ns_sorting('username'); ?>" name="username" ><?php echo fc_lang('账号'); ?></th>
			<th class="<?php echo ns_sorting('email'); ?>" name="email" ><?php echo fc_lang('邮箱'); ?></th>
			<th class="<?php echo ns_sorting('phone'); ?>" name="phone" ><?php echo fc_lang('电话'); ?></th>
			<th class="<?php echo ns_sorting('name'); ?>" name="name" ><?php echo fc_lang('姓名'); ?></th>
			<th class="<?php echo ns_sorting('regtime'); ?>" name="regtime" ><?php echo fc_lang('注册时间'); ?></th>
			<th class="dr_option"><?php echo fc_lang('操作'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
		<tr id="dr_row_<?php echo $t['uid']; ?>">
			<td><input name="ids[]" type="checkbox" class="dr_select toggle md-check" value="<?php echo $t['uid']; ?>" /></td>
			<td><?php echo $t['uid']; ?></td>
			<td><?php echo dr_keyword_highlight($t['username'], $param['keyword']); ?></td>
			<td><?php echo dr_keyword_highlight($t['email'], $param['keyword']); ?></td>
			<td><?php echo dr_keyword_highlight($t['phone'], $param['keyword']); ?></td>
			<td><?php echo dr_keyword_highlight($t['name'], $param['keyword']); ?></td>
			<td><?php echo dr_date($t['regtime'], NULL, 'red'); ?></td>
			<td class="dr_option">
			<?php if ($this->ci->is_auth('member/admin/home/edit')) { ?><a class="aedit" <?php if ($t['id']==1) { ?>href="javascript:;"<?php } else { ?>href="<?php echo dr_url('member/edit',array('uid'=>$t['uid'])); ?>"<?php } ?>> <i class="fa fa-edit"></i> <?php echo fc_lang('修改'); ?></a><?php } ?>
			</td>
		</tr> 
		<?php } } ?>
		<tr class="mtable_bottom">
        	<th width="20"  ><input name="dr_select" class="toggle md-check" id="dr_select" type="checkbox" onClick="dr_selected()" /></th>
			<td colspan="10"  >
            <?php if ($this->ci->is_auth('member/admin/home/del')) { ?>
				<label><button type="button" class="btn red btn-sm" name="option" onClick="$('#action').val('del');dr_confirm_set_all('<?php echo fc_lang('您确定要这样操作吗？'); ?>')"><i class="fa fa-trash"></i> <?php echo fc_lang('删除'); ?></button></label>
            <?php } ?>

			</td>
		</tr>
		</tbody>
		</table>
		</div>
	</div>
</div>
</form>
<div id="pages"><a><?php echo fc_lang('共%s条', $param['total']); ?></a><?php echo $_pages; ?></div>
<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>