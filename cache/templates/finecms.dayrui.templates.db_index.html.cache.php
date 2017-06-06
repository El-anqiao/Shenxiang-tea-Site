<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
	<?php if ($result) { ?>
	dr_tips('<?php echo $result; ?>', 3, 1);
	<?php } ?>
});
</script>
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
	<small><?php echo fc_lang('单击数据表名称可查看数据表的详细字段介绍'); ?></small>
</h3>

<form action="" method="post" name="myform" id="myform">
	<input name="action" id="action" type="hidden" value="del" />
	<div class="portlet mylistbody">
		<div class="portlet-body">
			<div class="table-scrollable">

				<table class="mytable table table-striped table-bordered table-hover table-checkable dataTable">

		<thead>
		<tr>
			<th></th>
			<th><?php echo fc_lang('表名称'); ?></th>
			<th>&nbsp;</th>
			<th><?php echo fc_lang('数据量'); ?></th>
			<th><?php echo fc_lang('多余空间'); ?></th>
			<th><?php echo fc_lang('文件大小'); ?></th>
			<th><?php echo fc_lang('更新时间'); ?></th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php if (is_array($list)) { $count=count($list);foreach ($list as $t) { ?>
		<tr>
		  <td align="right"><input name="select[]" class="dr_select toggle md-check" type="checkbox" value="<?php echo $t['name']; ?>" /></td>
		  <td><a href="javascript:;" onClick="dr_dialog_show('<?php echo fc_lang('表结构'); ?>', '<?php echo dr_url('db/tableshow', array('name'=>$t['name'])); ?>')"><?php echo $t['name']; ?></a></td>
		  <td><?php echo $t['note']; ?></td>
		  <td><?php echo $t['rows']; ?></td>
		  <td><?php echo dr_format_file_size($t['freesize']); ?></td>
		  <td><?php echo dr_format_file_size($t['filesize']); ?></td>
		  <td><?php echo $t['update']; ?></td>
		  <td><?php echo $t['collation']; ?></td>
		</tr>
		<?php } } ?>
		<tr class="mtable_bottom">
			<td align="right" ><input class=" toggle md-check" name="dr_select" id="dr_select" type="checkbox" onClick="dr_selected()" /></td>
			<td colspan="99" >
			<button type="submit" class="btn green btn-sm" name="submit" onClick="$('#action').val('1')"> <i class="fa fa-refresh"></i> <?php echo fc_lang('优化表'); ?></button>&nbsp;
			<button type="submit" class="btn blue btn-sm" name="submit" onClick="$('#action').val('2')"> <i class="fa fa-medkit"></i> <?php echo fc_lang('修复表'); ?></button>
			</td>
		</tr>        
		  </tbody>
		</table>
		</div>
	</div>
</div>
</form>

<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>