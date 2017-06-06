<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script type="text/javascript">
    $(function(){
        $.ajax({type: "GET", url:'<?php echo dr_url('upgrade/vlist'); ?>', dataType:'text',jsonp:"callback",
            success: function (data) {
                $("#dr_table_html").html(data);
            }
        });
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
    <small><?php echo fc_lang('FineCMS公益版提供终身免费升级服务'); ?></small>
</h3>

<div class="portlet light bordered">
    <div class="portlet-body">
        <div class="table-scrollable v3table" id="dr_table_html">
            数据加载中...
        </div>
    </div>
</div>
<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>