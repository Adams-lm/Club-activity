<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>社团活动管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../css/bootstrap.css" rel="stylesheet">
    <!-- sddr写的 -->
    <link rel="stylesheet" href="../../../css/activityInfo.css">
    <link rel="stylesheet" type="text/css" href="../../../css/iconfont.css">
    <link rel="stylesheet" type="text/css" href="../../../css/activity_show.css">
    <link rel="stylesheet" type="text/css" href="../../../css/joinActivity.css">
    <style>
      .img_three img{
        width:100%;
        height:120px;
      }
      @media all and (max-width:768px){
        .img_three img{
          width:100%;
          height:70px;
        }
      }
    </style>
  </head>

  <body>

    <div class="container">
      <div class="col-md-10 col-md-push-1 col-xs-12 "id="act_List">
        <!-- 连接数据库获取我参与的活动 -->
      </div>  
    </div>

    <!-- JavaScript -->
    <script src="../../../js/jquery-1.10.2.js"></script>
    <script src="../../../js/bootstrap.js"></script>
    <script src="../../../js/ajax/joinActivity.js"></script>
  </body>
</html>
