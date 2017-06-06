<?php if ($fn_include = $this->_include("nheader.html")) include($fn_include); ?>
<script type="text/javascript">
    $(function(){
        // 检查是否更新
        $.ajax({type: "GET", url:'http://v5.finecms.net/index.php?s=api&c=finecms&m=version&my=<?php echo DR_VERSION; ?>', dataType:'jsonp',jsonp:"callback",
            success: function (data) {
                $("#finecms_version").html(data.html);
            }
        });
    });
</script>

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo dr_url('home/main'); ?>"><?php echo fc_lang('网站后台'); ?></a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a class="blue"><?php echo fc_lang('总览'); ?></a>
        </li>
    </ul>
    <div class="page-toolbar">
    </div>
</div>
<!-- END PAGE BAR -->

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">
    <small></small>
</h3>

<?php if ($admin['usermenu']) { ?>
<div class="row" style="margin-bottom: 20px">
    <div class="col-md-12">
        <div class="admin-usermenu">
            <?php if (is_array($admin['usermenu'])) { $count=count($admin['usermenu']);foreach ($admin['usermenu'] as $t) { ?>
            <a class="btn <?php if ($t['color'] && $t['color']!='default') {  echo $t['color'];  } else { ?>btn-default<?php } ?>" href="<?php echo $t['url']; ?>"> <?php echo $t['name']; ?> </a>
            <?php } } ?>
        </div>
    </div>
</div>
<?php } ?>


<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cog font-red-sunglo" style="font-size: 20px;"></i>
                    <span class="caption-subject font-red-sunglo"><?php echo fc_lang('系统'); ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div>
                    <table class="table table-light mtable">
                        <tr>
                            <td width="160" class="mleft" align="right"><?php echo fc_lang('程序版本'); ?>：</td>
                            <td>&nbsp;<a href="<?php echo dr_url('upgrade/index'); ?>"> FineCMS&nbsp;v<?php echo DR_VERSION; ?>&nbsp; <b style="color:red" id="finecms_version"></b> </a></td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('服务器IP'); ?>：</td>
                            <td>&nbsp;<?php echo $sip; ?></td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('服务器环境'); ?>：</td>
                            <td>&nbsp;<?php echo $server; ?> </td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('PHP版本'); ?>：</td>
                            <td>&nbsp;PHP<?php echo PHP_VERSION; ?></td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('数据库版本'); ?>：</td>
                            <td>&nbsp;MySql<?php echo $sqlversion; ?></td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('上传最大值'); ?>：</td>
                            <td>&nbsp;<?php echo @ini_get("upload_max_filesize"); ?> </td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('POST最大值'); ?>：</td>
                            <td>&nbsp;<?php echo @ini_get("post_max_size"); ?></td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('页面执行内存上限'); ?>：</td>
                            <td>&nbsp;<?php echo @ini_get("memory_limit"); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user font-green-sharp" style="font-size: 20px;"></i>
                    <span class="caption-subject font-green-sharp  "><?php echo fc_lang('团队'); ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div>
                    <table class="table table-light mtable">
                        <tr>
                            <td width="160" class="mleft" align="right"><?php echo fc_lang('策划人'); ?>：</td>
                            <td>李睿</td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('程序组'); ?>：</td>
                            <td>邢鹏程、刘毅、陈锦辉、孙华军 </td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('交流论坛'); ?>：</td>
                            <td><a href="http://www.finecms.net" target="_blank">www.finecms.net</a> </td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('使用手册'); ?>：</td>
                            <td><a href="http://www.kancloud.cn/dayrui/finecms3" target="_blank">www.finecms.net</a> </td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('开发手册'); ?>：</td>
                            <td><a href="http://www1.dayrui.com/dev-doc/" target="_blank">www.finecms.net</a> </td>
                        </tr>
                        <tr>
                            <td class="mleft" align="right"><?php echo fc_lang('QQ用户群'); ?>：</td>
                            <td><a href="//shang.qq.com/wpa/qunwpa?idkey=10f4e87d43144e8d21c000cc9ade43d7568985473e6f35b85624b48f9604abca" target="_blank">8615168</a> </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<?php if ($fn_include = $this->_include("nfooter.html")) include($fn_include); ?>