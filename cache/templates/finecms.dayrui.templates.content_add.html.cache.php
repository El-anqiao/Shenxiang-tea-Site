<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script type="text/javascript">
$(function() {
    // 错误提示
	<?php if ($error) { ?>
	dr_tips('<?php echo $error['msg']; ?>', 3, '<?php echo intval($error['status']); ?>');
	<?php } ?>

});


</script>
<form class="form-horizontal" action="" method="post" id="myform" name="myform">
    <input name="page" id="page" type="hidden" value="<?php echo $page; ?>" />
    <input name="action" id="dr_action" type="hidden" value="back" />
    <input name="dr_id" id="dr_id" type="hidden" value="<?php echo $data['id']; ?>" />
    <input name="dr_module" id="dr_module" type="hidden" value="<?php echo APP_DIR; ?>" />
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

    <div class="row" style="margin-top:20px;margin-bottom: 50px;">
        <div class="col-md-9">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green sbold uppercase"><?php echo fc_lang('基本内容'); ?></span>
                    </div>
                    <?php if ($draft_list) { ?>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-edit"></i> <?php echo fc_lang('草稿'); ?> <span class="badge badge-success" id="dr_cg_nums"><?php echo count($draft_list); ?></span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" style="width:320px">
                                <?php if (is_array($draft_list)) { $count=count($draft_list);foreach ($draft_list as $t) { ?>
                                <li id="dr_cgbox_<?php echo $t['id']; ?>">
                                    <a href="javascript:;" class="dr_cgbox_select" id="dr_row_cgbox_<?php echo $t['id']; ?>" did="<?php echo $t['id']; ?>" islock="0"><?php if ($t['title']) {  echo $t['title'];  } else { ?>---<?php } ?> <span class="badge badge-s-danger" onclick="delete_draft('<?php echo $t['id']; ?>')"> <i class="fa fa-trash"></i> <?php echo dr_date($t['inputtime']); ?></span></a>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo fc_lang('栏目分类'); ?>：</label>
                            <div class="col-md-9">
                                <label><?php echo $select; ?></label>

                            </div>
                        </div>
                        <?php echo str_replace('col-md-9', 'col-md-10', $myfield); ?>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-3">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <div class="form-body">
                        <?php echo $sysfield; ?>
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
                                <button type="submit" class="btn green" onclick="$('#dr_action').val('back')"> <i class="fa fa-save"></i> <?php echo fc_lang('保存并返回'); ?></button>
                                <?php if (!$data['id']) { ?>
                                <button type="submit" class="btn default" onclick="$('#dr_action').val('continue')"> <i class="fa fa-save"></i> <?php echo fc_lang('保存并继续'); ?></button>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>