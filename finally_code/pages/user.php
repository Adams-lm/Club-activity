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
  <link href="../css/sb-admin.css" rel="stylesheet">
  <!-- icon_font -->
  <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
  <!-- sddr写的 -->
  <link rel="stylesheet" href="../css/mystyle_index_user.css">
</head>

<body>

  <div id="wrapper" style="height:100%">

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="font-size: 1.8rem;">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="user.php" style="font-size: 2.3rem;">领航者社团</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse" id="navbar" style="background-color:#325972">      <!-- 顶部颜色 -->
        <ul class="nav navbar-nav side-nav" style="background-color:#325972"> <!-- 侧边颜色 -->

          <!-- <li><a href="admin.php" style="font-size: 1.5rem;"><i class="fa fa-dashboard"></i> 首 页</a></li> -->

          <li class="dropdown" >
            <a href="user/activityDisplay/showActivity.php" target="iframe_link" class="dropdown-toggle" data-toggle="dropdown" style="font-size: 1.5rem;">
              <i class="fa fa-caret-square-o-down"></i> 社团活动 <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="user/activityDisplay/showActivity.php" target="iframe_link" data-stopPropagation="true">查询所有活动</a></li>
              <li><a href="user/activityDisplay/joinActivity.php" target="iframe_link" data-stopPropagation="true">我参与的活动</a></li>
              
            </ul>
          </li>

          <li class="dropdown">
            <a href="user/selfInformation/buyVip.php" target="iframe_link" class="dropdown-toggle" data-toggle="dropdown" style="font-size: 1.5rem;">
              <i class="fa fa-caret-square-o-down"></i> 个人中心 <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="user/selfInformation/buyVip.php" target="iframe_link" data-stopPropagation="true">购买会员</a></li>
              <li><a href="user/selfInformation/updateInfo.php" target="iframe_link" data-stopPropagation="true">修改信息</a></li>
            </ul>
          </li>
        </ul>
        <!-- 侧边栏结束 -->

        <!-- 顶栏开始   -->
        <ul class="nav navbar-nav navbar-right navbar-user">
          <li class="dropdown user-dropdown">

            <a href="#" class="dropdown-toggle" style="padding: 10px 40px;" data-toggle="dropdown" 
              style="font-size: 1.8rem;">
              <?php
                  include("../php/functions.php");
                  session_start();
                  if(isset($_SESSION["userName"])){
                    echo '<img id="user_image" src="../images/QQ.png" alt="" style="width: 28px;
                      height: 28px;border-radius: 20px;margin-right: 10px;">';
                    echo '<i class="fa fa-user"></i> <span id="userName_span">'.$_SESSION["userName"].'</span> <b class="caret"></b></a>';
                  }else{
                    page_redirect(1,"../index.php","请先登录！");
                  }
              ?>
              <!-- <img src="../images/QQ.png" alt="" style="width: 28px;height: 28px;border-radius: 20px;margin-right: 10px;"> -->
              <!-- <i class="fa fa-user"></i> 用户名 <b class="caret"></b></a> -->
            <ul class="dropdown-menu">
              <!-- <li><a href="#"><i class="fa fa-user"></i> 账号设置</a></li>
              <li><a href="#"><i class="fa fa-envelope"></i> 消息 <span class="badge">7</span></a></li>
              <li><a href="#"><i class="fa fa-gear"></i> 帮助</a></li> -->
              <li class="divider"></li>
              <li><a href="../php/logout.php"><i class="fa fa-power-off"></i> 退出</a></li>
            </ul>
          </li>
        </ul><!-- 顶栏结束 -->
      </div><!-- /.navbar-collapse -->
    </nav>


    <div id="page-wrappper" style="height:100%">
      <iframe src="user/activityDisplay/showActivity.php" name="iframe_link"></iframe>
    </div>

  </div>

  <!-- JavaScript -->
  <script src="../js/jquery-1.10.2.js"></script>
  <script src="../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../js/raphael-min.js"></script>
  <script src="../js/tablesorter/jquery.tablesorter.js"></script>

  <script type="text/javascript">
  //下拉框查询组件点击查询栏时不关闭下拉框
  $("body").on('click','[data-stopPropagation]',function (e) {
        e.stopPropagation();
    });

  //小屏幕下的导航条折叠
  if ($(window).width() < 768) {
    //点击导航链接之后，把导航选项折叠起来
    $(".dropdown-menu a").click(function () {
      $("#navbar").collapse('hide');
    });
  }

  $(document).ready(function(){
    $.post("../php/getUserInfo.php","",function(data){
      data=$.parseJSON(data);
      a=data[0].image.split("/");
      $("#user_image").attr("src","../upload/"+a[4]);
      $("#userName_span").html(data[0].user_name);
    });
  });

  </script>

</body>

</html>