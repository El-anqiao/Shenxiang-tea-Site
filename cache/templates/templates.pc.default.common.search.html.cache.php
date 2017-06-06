<?php $indexc=1; if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<link href="<?php echo HOME_THEME_PATH; ?>css/detail.css" rel="stylesheet" />
<div class="blog-body">
    <div class="blog-container">
        <blockquote class="layui-elem-quote sitemap layui-breadcrumb shadow">
            <a href="/" title="网站首页">网站首页</a>
            <?php echo dr_catpos($get['catid'], '', true, '<a href="[url]">[name]</a>'); ?>
            <a><cite>搜索内容</cite></a>
        </blockquote>


        <div class="blog-main">


            <div class="page-content-inner">
                <div class="search-page search-content-1">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <ul class="nav nav-tabs" style="float:left;">
                                <?php $rt = $this->list_tag("action=cache name=module"); if ($rt) extract($rt); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                                <li class="<?php if ($mid==$t['dirname']) { ?>active<?php } ?>">
                                    <a href="<?php echo dr_search_url($params, 'mid', $t['dirname']); ?>"> <?php echo $t['name']; ?> </a>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <p style="line-height:30px">
                                <strong>分类：</strong>
                                <a class="label <?php if (!$get['catid'] || $cat['child']) { ?>label-success<?php } else { ?>label-default<?php } ?>" href="<?php echo dr_search_url($params, 'catid', NULL); ?>">不限</a>
                                <!--调用栏目分类，这种用法只能用于模型列表与搜索页面-->
                                <?php if (is_array($related)) { $count=count($related);foreach ($related as $t) {  if ($t['mid']==$mid) { ?>
                                <a class="label <?php if ($t['id']==$get['catid']) { ?>label-success<?php } else { ?>label-default<?php } ?>" href="<?php echo dr_search_url($params, 'catid', $t['id']); ?>"><?php echo $t['name']; ?></a>
                                <?php }  } } ?>
                            </p>
                            <div class="search-bar ">
                                <div class="input-group">
                                    <input type="text" onkeypress="if(event.keyCode==13) {searchByClass();return false;}"name='keyword' value='<?php echo $keyword; ?>' id='dr_search_keyword'  class="form-control" placeholder="输入关键字搜索">
                                    <span class="input-group-btn">
                                        <button class="btn blue uppercase bold" onclick="searchByClass()" type="button">搜索</button>
                                    </span>
                                    <script type="text/javascript">
                                        function searchByClass(){
                                            var url="<?php echo dr_search_url($params, 'keyword', 'dayruicom'); ?>";
                                            var value=$("#dr_search_keyword").val();
                                            if (value) {
                                                location.href=url.replace('dayruicom', value);
                                            } else {
                                                dr_tips("输入关键字");
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="blog-main-left">
                        <!--分页显示列表数据-->
                        <?php $rt = $this->list_tag("action=sql module=$mid sql='$search_sql' page=1 pagesize=10 urlrule=$urlrule"); if ($rt) extract($rt); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <div class="article shadow">
                            <?php if (!IS_MOBILE) { ?>
                            <div class="article-left">
                                <img src="<?php echo dr_thumb($t['thumb']); ?>" style="width: 150px" />
                            </div>
                            <?php } ?>
                            <div class="article-right" <?php if (IS_MOBILE) { ?> style="float: left"<?php } ?>>
                                <div class="article-title">
                                    <a href="<?php echo $t['url']; ?>"><?php echo $t['title']; ?></a>
                                </div>
                                <div class="article-abstract">
                                    <?php echo $t['description']; ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="article-footer">
                                <span><i class="fa fa-list"></i>&nbsp;&nbsp;<a href="<?php echo dr_cat_value($t['catid'], 'url'); ?>"><?php echo dr_cat_value($t['catid'], 'name'); ?></a></span>
                                <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $t['updatetime']; ?></span>
                                <?php if ($t['keywords']) {  $tag = explode(',',$t['keywords']);?>
                                <span><i class="fa fa-tag"></i>&nbsp;&nbsp;
                        <?php if (is_array($tag)) { $count=count($tag);foreach ($tag as $c) { ?><a href="<?php echo dr_tags_url($c); ?>"><?php echo $c; ?></a><?php } } ?>
                        </span>
                                <?php } ?>
                                <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;<?php echo $t['hits']; ?></span>
                            </div>
                        </div>
                        <?php } } ?>

                        <div class="search-pagination">
                            <ul class="pagination">
                                <?php echo $pages; ?>
                            </ul>
                        </div>
                    </div>


                </div>


            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>