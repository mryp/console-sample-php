<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>

    <!-- Bootstrap Core CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo Uri::base(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" />

    <!-- MetisMenu CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo Uri::base(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" />

    <!-- Custom CSS -->
    <?php echo Asset::css("sb-admin-2.css"); ?>

    <!-- Custom Fonts -->
    <link type="text/css" rel="stylesheet" href="<?php echo Uri::base(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- 左上・右上設定 --> 
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">トグルメニュー</span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Uri::base(); ?>console/index">○○○コンソール</a>
            </div><!-- /.navbar-header -->

            <!-- ユーザー設定メニュー -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo Uri::base(); ?>console/profile"><i class="fa fa-gear fa-fw"></i> ユーザー設定</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo Uri::base(); ?>console/logout"><i class="fa fa-sign-out fa-fw"></i> ログアウト</a></li>
                    </ul>
                </li>
            </ul><!-- /.navbar-top-links -->

            <!-- サイドメニュー表示 -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo Uri::base(); ?>console/index"><i class="fa fa-dashboard fa-fw"></i> ダッシュボード</a>
                        </li>
                        <li>
                            <a href="<?php echo Uri::base(); ?>console/table"><i class="fa fa-table fa-fw"></i> 集計</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog fa-fw"></i> 設定<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo Uri::base(); ?>console/optionuser">ユーザー一覧</a></li>
                                <li><a href="<?php echo Uri::base(); ?>console/optionadduser">ユーザー追加</a></li>
                                <li><a href="<?php echo Uri::base(); ?>console/optiongen">全般設定</a></li>
                            </ul><!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <?php echo $content; ?>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo Uri::base(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?php echo Uri::base(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="<?php echo Uri::base(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <?php echo Asset::js("sb-admin-2.js"); ?>

</body>
</html>