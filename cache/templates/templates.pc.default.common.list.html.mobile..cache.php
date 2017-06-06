<?php if ($fn_include = $this->_include("header.html")) include($fn_include); ?>
<link href="<?php echo HOME_THEME_PATH; ?>css/article.css" rel="stylesheet" />
<div class="blog-body">
    <div class="blog-container">
        <blockquote class="layui-elem-quote sitemap layui-breadcrumb shadow">
            <a href="/" title="网站首页">网站首页</a>
            <?php echo dr_catpos($catid, '', true, '<a href="[url]">[name]</a>'); ?>
            <a><cite>列表</cite></a>
        </blockquote>
        <div class="blog-main">
            <div class="blog-main-left">
                <!--分页显示列表数据-->
                <?php $rt = $this->list_tag("action=module catid=$catid order=displayorder,updatetime page=1"); if ($rt) extract($rt); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                <div class="article shadow">
                    <div class="article-left">
                        <img src="<?php echo dr_thumb($t['thumb']); ?>" />
                    </div>
                    <div class="article-right">
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
            <div class="blog-main-right">

                <div class="article-category shadow">
                    <div class="article-category-title">分类导航</div>

                    <!--循环同级栏目或者子栏目-->
                    <?php if (is_array($related)) { $count=count($related);foreach ($related as $c) { ?>
                    <a href="<?php echo $c['url']; ?>"><?php echo $c['name']; ?></a>
                    <?php } } ?>
                    <div class="clear"></div>
                </div>

                <div class="blog-module shadow">
                    <div class="blog-module-title">本类热门</div>
                    <ul class="fa-ul blog-module-ul">
                        <?php $rt = $this->list_tag("action=module catid=$catid order=hits num=15"); if ($rt) extract($rt); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="<?php echo $t['url']; ?>"><?php echo dr_strcut($t['title'], 35); ?></a></li>

                        <?php } } ?>
                    </ul>
                </div>
                <div class="blog-module shadow">
                    <div class="blog-module-title">随便看看</div>
                    <ul class="fa-ul blog-module-ul">
                        <?php $rt = $this->list_tag("action=module catid=$catid order=rand num=15"); if ($rt) extract($rt); $count=count($return); if (is_array($return)) { foreach ($return as $key=>$t) { ?>
                        <li><i class="fa-li fa fa-hand-o-right"></i><a href="<?php echo $t['url']; ?>"><?php echo dr_strcut($t['title'], 35); ?></a></li>
                        <?php } } ?>
                    </ul>
                </div>
                <!--右边悬浮 平板或手机设备显示-->
                <div class="category-toggle"><i class="fa fa-chevron-left"></i></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php if ($fn_include = $this->_include("footer.html")) include($fn_include); ?>