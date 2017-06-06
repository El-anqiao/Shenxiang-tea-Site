<?php $indexc=1; if ($fn_include = $this->_include("header.html", "/")) include($fn_include); ?>



<div class="blog-body">
	<div class="blog-container">
		<blockquote class="layui-elem-quote sitemap layui-breadcrumb shadow">
			<a href="/" title="网站首页">网站首页</a>
			<a><cite>注册会员</cite></a>
		</blockquote>
		<div class="blog-main">
			<div class="portlet light">
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-4 col-md-offset-4 member-form">


							<form class="login-form" action="" id="myform" method="post">
								<input type="hidden" name="back" value="<?php echo $back_url; ?>">

								<div class="form-group">
									<label class="control-label visible-ie8 visible-ie9">会员名称</label>
									<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="会员名称" name="data[username]" />
								</div>
								<div class="form-group">
									<label class="control-label visible-ie8 visible-ie9">安全邮箱</label>
									<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="安全邮箱" name="data[email]" />
								</div>
								<div class="form-group">
									<label class="control-label visible-ie8 visible-ie9">登录密码</label>
									<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="登录密码" name="data[password]" />
								</div>
								<div class="form-group">
									<label class="control-label visible-ie8 visible-ie9">确认密码</label>
									<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="确认密码" name="data[password2]" />
								</div>
								<?php if ($code) { ?>
								<div class="form-group">
									<div class="col-sm-6" style="padding-left:0;padding-right:0">
										<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="验证码" name="code" />
									</div>
									<div class="col-sm-6">
										<img align="absmiddle" style="cursor:pointer;" onclick="this.src='<?php echo dr_member_url('api/captcha', array('width' => 120, 'height' => 40)); ?>&'+Math.random();" src="<?php echo dr_member_url('api/captcha', array('width' => 120, 'height' => 40)); ?>" />
									</div>
								</div>
								<?php } ?>
								<div class="form-actions">
									<button type="button" onclick="dr_submit()" class="btn green uppercase">注册账号</button>
									<a href="<?php echo dr_member_url('login/find'); ?>" class="forget-password">找回密码</a>
									<a href="<?php echo dr_member_url('login/index'); ?>" id="register-btn" class="uppercase">直接登录</a>
								</div>
							</form>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    function dr_submit() {
        var post = $("#myform").serialize();
        $.ajax({type: "POST",dataType:"json", url: "<?php echo dr_now_url(); ?>", data: post,
            success: function(data) {
                if (data.status) {
                    dr_tips('注册成功，即将为您跳转....', 3, 1);
                    setTimeout('window.location.href="'+data.backurl+'"', 2000);
                    var sync_url = data.syncurl;
                    // 发送同步登录信息
                    for(var i in sync_url){
                        $.ajax({
                            type: "GET",
                            async: false,
                            url:sync_url[i],
                            dataType: "jsonp",
                            success: function(json){ },
                            error: function(){ }
                        });
                    }
                } else {
                    dr_tips(data.code);
                }
            },
            error: function(HttpRequest, ajaxOptions, thrownError) {
                alert(HttpRequest.responseText);
            }
        });
    }
</script>
<?php if ($fn_include = $this->_include("footer.html", "/")) include($fn_include); ?>