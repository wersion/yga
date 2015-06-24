<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use kartik\widgets\Alert;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="utf-8"/>
    <title><?= Yii::$app->params['webname'].'-'.(is_array($this->params['breadcrumbs'])?end($this->params['breadcrumbs']):'未定义') ?></title>

    <!--貌似没什么用-->
    <?= Html::cssFile('/css/font-awesome-ie7.min.css',['condition'=>'IE 7']) ?>
    <?= Html::cssFile('/css/ace-ie.min.css',['condition'=>'lte IE 8']) ?>
    <?= Html::jsFile('/js/html5shiv.js',['condition'=>'lte IE 9']) ?>
    <?= Html::jsFile('/js/respond.min.js',['condition'=>'lte IE 9']) ?>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="navbar navbar-default" id="navbar">
    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand" style="height: 40px">
                <small>
                    <i class="icon-flag"></i>
                    <?= Yii::$app->params['webname'] ?>
                </small>
            </a><!-- /.brand -->
        </div>
        <!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-bell-alt icon-animated-bell"></i>
                        <span class="badge badge-important">8</span>
                    </a>

                    <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-warning-sign"></i>
                            8 Notifications
                        </li>
                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">
                                        <i class="btn btn-xs no-hover btn-pink icon-comment"></i>
                                        New Comments
                                    </span>
                                    <span class="pull-right badge badge-info">+12</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                查看所有通知
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <span class="user-info">
                                <small>Welcome,</small>
                                <?= Yii::$app->user->identity->username ?>
                            </span>
                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="<?= Url::to(['user/changepwd']) ?>">
                                <i class="icon-edit"></i>
                                修改密码
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= Url::to(['user/logout']) ?>">
                                <i class="icon-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.ace-nav -->
        </div>
        <!-- /.navbar-header -->
    </div>
    <!-- /.container -->
</div>

<div class="main-container" id="main-container">

<div class="main-container-inner">
<a class="menu-toggler" id="menu-toggler" href="#">
    <span class="menu-text"></span>
</a>
<div class="sidebar" id="sidebar">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div>
    <!-- #sidebar-shortcuts -->
   <ul class="nav nav-list">
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> 全局设置 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo yii::$app->urlManager->createUrl('/weixin')?>" target="main">
										<i class="icon-double-angle-right"></i>
										公众号管理
									</a>
								</li>

								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
                                                                                                        多用户管理
										<b class="arrow icon-angle-down"></b>
									</a>
									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												资料设置
											</a>
										</li>
                                         <li>
											<a href="#">
												<i class="icon-leaf"></i>
												注册设置
											</a>
										</li>
										 <li>
											<a href="#">
												<i class="icon-leaf"></i>
												用户管理
											</a>
										</li>
										 <li>
											<a href="#">
												<i class="icon-leaf"></i>
												用户组管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
                                                                                                系统管理                                                              
										<b class="arrow icon-angle-down"></b>
									</a>
									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												账号管理
											</a>
										</li>
                                         <li>
											<a href="#">
												<i class="icon-leaf"></i>
												更新缓存
											</a>
										</li>
										 <li>
											<a href="#">
												<i class="icon-leaf"></i>
												版权及站点设置
											</a>
										</li>
										 <li>
											<a href="#">
												<i class="icon-leaf"></i>
												数据库
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												工具
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												其他设置
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 基本设置 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										自动回复
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												文字回复
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												图文回复
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												音乐回复
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												自定义接口回复
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												常用服务接入
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												自定义菜单
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											特殊回复
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微站功能
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												网站风格设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站栏目设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												底部菜单设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												个人中心菜单设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												幻灯片设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站访问入口
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											微站文章设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											页面信息设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										参数设置&其他
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												公众号资料
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												模块列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												支付参数
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												其他参数
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												常用服务接入
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text">我的服务 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
							<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										用户中心
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												我的账号
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												我的金额
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												充值记录
											</a>
										</li>
									</ul>
								</li>
							<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										oAuth2.0特权
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												测试入口
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												特权设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												错误日志
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												借用记录
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										新全民经纪人
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												全民经纪人入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												销售员入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												经理入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												佣金管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												客户管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												经纪人管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											销售人员管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											经理管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											产品管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											身份类型管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											数据分析
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											初始设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										独立全民经纪人
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												独立全民经纪人
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										淘宝同步助手
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												单品获取
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												批量获取
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												整店获取
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												仓库宝贝
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												系统设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										全民分销系统
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												购物入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												代理入口
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												排行榜入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												积分兑换设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												订单管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												CRM会员管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										商品管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										商品分类
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										积分商品设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										积分兑换管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										代理管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										佣金审核
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										物流配送设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										基础设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										首页广告设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
										参数设置
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text">展示应用 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
                                <li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微画报
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												画报列表入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												画报列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微场景高级版
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												场景菜单
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												帮助文档
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										场景魔方
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												场景菜单
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										新照片墙
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												照片墙管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微信墙
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
                        <li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text">客户关系 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
                                <li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微会员
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												优惠券入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												会员卡入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												消费密码管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												优惠券管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												商家设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												会员卡设置
											</a>
										</li>
										
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微会员高级版
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												会员卡设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												商家设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												积分策略
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												等级设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												会员特权
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												会员管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												通知管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												礼品券管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												优惠券管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												门店系统
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										新粉丝模块
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												同步粉丝
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												粉丝分组
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											粉丝列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											素材管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											群发信息
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										幸运机
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												活动管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										客服系统
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												会员聊天
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												消息记录
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												客服管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												客服登陆
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												工单管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												工单信息
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												群发消息
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微名片
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键词触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												名片管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												公司设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												分类管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微名片个人版
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												名片管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												公司设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微信客服
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												坐席管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												设置客服
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												手工添加客服
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										留言墙
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												留言墙入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												基本设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												留言管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										美洽客服接入
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												美洽客服接入
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										有奖问卷
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												问卷中心
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												题库管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												问卷管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												数据分析
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												帮助
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										会员注册
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												会员组管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												管理会员
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										调研
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												调研活动列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												新建调研活动
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
                        <li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text">营销互动 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
                                <li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										送祝福
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										新微喜帖
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												喜帖管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										积分兑换
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												积分兑换设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												兑换商品管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												兑换请求管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										茶叶蛋
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
									   地方话
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												地方话管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										砸蛋
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										积分兑换跟随
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										足球竞猜
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											竞猜入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											竞猜设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												比赛管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												用户管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										转发有礼
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												转发模块管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											转发有礼管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												转发数据管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										GO分享
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											主题列表管理员入口
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											主题活动管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												奖品分组管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												奖品信息管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												奖品兑换管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										凑一对
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
									   送贺卡
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												违章导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											贺卡管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										恶搞七夕
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微路由
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												路由器管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											认证记录
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										猜拳
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										刮刮卡高级版
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												刮刮卡管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										超级贺卡
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											贺卡入口
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											 关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												贺卡列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										万能分享卡
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键词触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												预设关键字
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
									   分享达人
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										美女报时
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											照片管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										攒红包
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												红包活动管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											授权接口设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										全民抢礼品
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											全民抢礼品入口
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												全民抢礼品管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												全民抢粉丝达人
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												全民抢分享数据
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												兑换地点管理表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												密卡数据管理表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												爆表排行榜管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										砸金蛋
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											砸金蛋管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										幸运拆礼盒
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											幸运拆礼盒入口
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												幸运拆礼盒管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												拆礼盒粉丝达人
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												拆礼盒分享数据
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												拆礼盒奖品数据
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
									   老虎机
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												活动设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
									   文本投票
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										新分享集赞
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												分享模块管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											分享积攒管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												分享积攒排名
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微作品
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										更新有礼
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												粉丝更新记录
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微投票
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											微投票管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微助力
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												助力活动管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											授权接口设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
									   博压岁钱
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												奖项管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微拍
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												设备管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										摇钱树
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
									   摇一摇现场版
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										摇一摇 非现场
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										做粽子
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										组团来砍价
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											查看订单
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微V投票
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-tag"></i>
								<span class="menu-text"> 游戏应用 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
							<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										趣味测试
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											趣味测试入口
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											我的测试
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												系统题库
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										冰桶挑战
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												基本设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										中秋博饼
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												奖项管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										校花校草
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												基本设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										英雄联盟
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										踩白块
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										游戏管家
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											封面设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											游戏类型
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												游戏管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											幻灯片
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
								    看看你是有多色
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											封面设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										中国象棋
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											封面
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
                        <li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text">常用工具 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
                                <li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										周边商户
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												商户列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												添加商户
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										图文签到
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												签到信息
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										360全景
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										打卡
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												打卡记录
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微短信
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										一刻钟签到
										<b class="arrow icon-angle-down"></b>
									</a>
									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										万能查询
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												查询数据结构管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										二维码推广
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											生成二维码
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												管理二维码
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											 扫描统计
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										三维全景
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											全景入口设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											全景管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										留言板
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
									 随堂测试
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微拍全屏版
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										签到
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												签到记录
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										微报名系统
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											报名活动列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												新建报名活动
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										新小黄鸡机器人
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										便民小工具
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											封面设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										时光轴
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表 
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											活动管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										YIFI上网认证
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										WIFI营销功能
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										WIFI营销专业版
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												路由器管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											认证记录
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										项目客户管理
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												项目管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											参数设置
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text">其他 </span>
								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
						<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										实用工具
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											工具管理
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										漂流瓶
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										附近商户
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
									    2048游戏
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										多客服转接
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										关键字回复
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										小黄鸡自动陪聊
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										预约单表
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												微站导航设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											预约活动列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												新建预约活动
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										小尾巴
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											小尾巴设置
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												小尾巴设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										数据统计
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											聊天记录
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												规则使用率
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字命中率
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										一战到底
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												一战到底
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											参数设置
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										积分签到
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											关键字触发列表
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
												签到管理
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-leaf"></i>
											统计分析
											</a>
										</li>
									</ul>
								</li>
						</ul>
						</li>
						
					</ul>
    <!-- /.nav-list -->
    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left"
           data-icon2="icon-double-angle-right"></i>
    </div>
</div>
<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <?= \yii\widgets\Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n",
            'links'=>$this->params['breadcrumbs']?:['未定义'],
        ]) ?>
        <!-- .breadcrumb -->
        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input"
                           id="nav-search-input" autocomplete="off"/>
                    <i class="icon-search nav-search-icon"></i>
                </span>
            </form>
        </div>
        <!-- #nav-search -->
    </div>
    <div class="page-content">
        <!-- /.page-header -->
        <div class="row">
            <?php if ($msg = Yii::$app->session->getFlash('success')): ?>
                <?=
                Alert::widget([
                    'body' => ($msg==1)?'操作成功':$msg,
                    'delay' => 1000,
                    'type' => Alert::TYPE_SUCCESS,
                ]) ?>
            <?php endif; ?>
            <?php if (Yii::$app->session->getFlash('fail')): ?>
                <?=
                Alert::widget([
                    'body' => Yii::$app->session->getFlash('fail'),
                    'type' => Alert::TYPE_DANGER,
                ]) ?>
            <?php endif; ?>
            <?= $content ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.page-content -->
</div>
<!-- /.main-content -->
<!-- /#ace-settings-container -->
</div>
<!-- /.main-container-inner -->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
</div>


<?php $this->endBody() ?>
<script type="text/javascript">
    jQuery(function ($) {
        //菜单收缩
        var route = '/<?= Yii::$app->requestedRoute ?>';
        if($("#sidebar li:has(a[href='"+route+"'])").length==0)
            route = '<?= Yii::$app->session->get('referrerroute') ?>';
        $("#sidebar li:has(a[href='"+route+"'])").attr('class','active open');
        //侧边收缩
        var sidebar = $('#sidebar');
        if($.cookie('sidebar')!='')
        {
            sidebar.attr('class', $.cookie('sidebar'));
        }
        sidebar.click(function(){
            $.cookie('sidebar', sidebar.attr('class'), {path: '/'});
        })
    })
</script>
</body>
</html>
<?php $this->endPage() ?>