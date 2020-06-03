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
  <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css"><!-- icon_font -->
  <!-- sddr写的 -->
  <link rel="stylesheet" href="../css/mystyle_index.css">
</head>

<body>

  <div id="wrapper" style="height:100%">

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
        <a class="navbar-brand" href="admin.php">社团名称</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

          <li class="active"><a href="admin.php"><i class="fa fa-dashboard"></i> 首 页</a></li>

          <li class="dropdown">
            <a href="admin/activityManagement/addActivity.php" target="iframe_link" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-caret-square-o-down"></i> 管理社团活动 <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="admin/activityManagement/addActivity.php" target="iframe_link">发布社团活动</a></li>
              <li><a href="admin/activityManagement/approveActJoin.php" target="iframe_link">审批报名申请</a></li>
              <li><a href="admin/activityManagement/manageActInfo.php" target="iframe_link">管理活动信息</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="admin/userManagement/approveAccount.php" target="iframe_link" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-caret-square-o-down"></i> 管理用户信息 <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="admin/userManagement/approveAccount.php" target="iframe_link">审批注册用户</a></li>
              <li><a href="admin/userManagement/manageAccount.php" target="iframe_link">管理在册用户</a></li>
            </ul>
          </li>
        </ul>
        <!-- 侧边栏结束 -->

        <!-- 顶栏开始   -->
        <ul class="nav navbar-nav navbar-right navbar-user">
          <li class="dropdown user-dropdown">

            <a href="#" class="dropdown-toggle" style="padding: 10px 40px;" data-toggle="dropdown">
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


    <div id="page-wrappper" style="height:100%">
      <iframe src="" name="iframe_link"></iframe>
    </div>

  </div>

  <!-- JavaScript -->
  <script src="../js/jquery-1.10.2.js"></script>
  <script src="../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../js/raphael-min.js"></script>
  <script src="../js/tablesorter/jquery.tablesorter.js"></script>

</body>

</html>