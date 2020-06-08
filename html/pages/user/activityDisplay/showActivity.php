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
  <link rel="stylesheet" href="../../../css/showActivity.css">
  <style>
    .img_three img {
      width: 100%;
      height: 120px;
    }

    .car_pic {
      /* width:80%; */
      height: 120px;
    }

    @media all and (max-width:768px) {
      .img_three img {
        width: 100%;
        height: 70px;
      }
    }
  </style>

</head>

<body>
  <!-- 悬浮按钮 -->
  <div id="dg" style="z-index: 9999; position: fixed ! important; right: 40px; bottom: 90px;">
    <table width="100%" style="position: absolute; width:260px; right: 40px; bottom: 90px;">
      <div id="start_music"><svg class="icon" aria-hidden="true">
          <use xlink:href="#icon-yiliao"></use>
        </svg></div>
      <div id="cust_service"><svg class="icon" aria-hidden="true">
          <use xlink:href="#icon-kefu"></use>
        </svg></div>
    </table>
  </div>
  <!-- music -->
  <audio autobuffer autoloop loop controls preload="auto" class="my_audio">
    <source src="goodtime.mp3">
    <object type="audio/x-wav" data="goodtime.mp3" width="290" height="45">
      <param name="autoplay" value="true">
    </object>
  </audio>

  <!-- carousel轮播图-->
  <div id="carousel" class="jumbotron">
    <div class="container">
      <!-- carousel -->
      <div id="carousel-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-generic" data-slide-to="1"></li>
          <li data-target="#carousel-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img class="car_pic" src="../../../images/pic1.png" alt="pic1" id="carpic1">
            <div class="carousel-caption"></div>
          </div>
          <div class="item">
            <img class="car_pic" src="../../../images/pic1.png" alt="pic2" id="carpic2">
            <div class="carousel-caption"></div>
          </div>
          <div class="item">
            <img class="car_pic" src="../../../images/pic1.png" alt="pic3" id="carpic3">
            <div class="carousel-caption"></div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div><br>
  <!-- carousel end-->

  <!-- content -->
  <div class="container">
    <div class="col-md-10 col-md-push-1 col-xs-12" id="act_show">
      <!-- 三图一行展示活动 连接数据库-->

      <!-- 一图一行 连接数据库-->

    </div><br>
  </div>

  <!-- footer -->
  <div class="row well">
    <footer class="container col-md-12 col-xs-12">
      <p>杭州师范大学</p>
      <p>&copy; 2020</p>
    </footer>
  </div>


  <!-- JavaScript -->
  <script src="../../../js/jquery-1.10.2.js"></script>
  <script src="../../../js/bootstrap.js"></script>
  <script src="http://at.alicdn.com/t/font_1720545_tymu1d14pug.js"></script>
  <script src="../../../js/ajax/showActivity.js"></script>

</body>

</html>