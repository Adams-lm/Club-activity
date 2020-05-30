<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>社团活动管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here --> 
    <link href="../css/sb-admin.css" rel="stylesheet"><!-- 侧边栏 -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css"><!-- icon_font -->
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="../css/morris-0.4.3.min.css">
    <!-- sddr写的 -->
    <link rel="stylesheet" href="../css/mystyle_index.css">
  </head>

  <body>
    <div class="row">
      <div class="col-md-2">
        <div id="wrapper">

          <!-- Sidebar -->
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="user.php">社团名称</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">

                <li class="active"><a href="user.php"><i class="fa fa-dashboard"></i> 首  页</a></li>

               <li class="dropdown"> 
                  <a href="user/activityDisplay/showActivity.php" target="iframe_link"  data-toggle="dropdown" class="dropdown-toggle">
                    <i class="fa fa-caret-square-o-down"></i> 社团活动 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="user/activityDisplay/showActivity.php" target="iframe_link">查询所有活动</a></li>
                    <li><a href="user/activityDisplay/joinActivity.php" target="iframe_link">我参与的活动</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="user/selfInformation/buyVip1.0.php" target="iframe_link" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-caret-square-o-down"></i> 个人中心 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="user/selfInformation/buyVip.php" target="iframe_link">购买会员</a></li>
                    <li><a href="user/selfInformation/updateInfo.php" target="iframe_link">修改信息</a></li>
                  </ul>
                </li>
              </ul>
              <!-- 侧边栏结束 -->

              <!-- 顶栏开始   -->
              <ul class="nav navbar-nav navbar-right navbar-user">
                <li class="dropdown user-dropdown">
                  
                  <a href="#" class="dropdown-toggle" style="padding: 10px 40px;"data-toggle="dropdown">
                    <img src="../images/QQ.png" alt="" style="width: 28px;height: 28px;border-radius: 20px;margin-right: 10px;">
                    <i class="fa fa-user"></i> 用户名 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-user"></i> 账号设置</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> 消息 <span class="badge">7</span></a></li>
                    <li><a href="#"><i class="fa fa-gear"></i> 帮助</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-power-off"></i> 退出</a></li>
                  </ul>
                </li>
              </ul><!-- 顶栏结束 --> 
            </div><!-- /.navbar-collapse -->
          </nav>
        </div><!-- /#wrapper -->
      </div><!-- /.col-md-2 -->

      <div class="col-md-10"><!-- scrolling="no"  -->
        <iframe src="" name="iframe_link"></iframe>
      </div><!-- /.col-md-10 -->

    </div><!-- /.row -->

    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->    
    <script src="../js/morris-0.4.3.min.js"></script>
    <script src="../js/morris/chart-data-morris.js"></script>
    <script src="../js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../js/tablesorter/tables.js"></script>

  </body>
</html>
