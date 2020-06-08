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
</head>

<body>
  <!-- 悬浮按钮 -->
  <div id="dg" style="z-index: 9999; position: fixed ! important; right: 40px; bottom: 90px;">
    <table width="100%" style="position: absolute; width:260px; right: 40px; bottom: 90px;">
      <div id="start_music"><svg class="icon_float" aria-hidden="true">
          <use xlink:href="#icon-yiliao"></use>
        </svg></div>
      <div id="cust_service"><svg class="icon_float" aria-hidden="true">
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

  <!-- content -->
  <div class="container">
    <header class="row">
      <?php
      //获取当页活动id
      $a_id = $_GET["act_id"];
      echo '<h1 id="act_title" data-actid="' . $a_id . '"></h1>';
      ?>
    </header>

    <!-- 活动内容 -->
    <div class="col-md-10 col-md-push-1 col-xs-12">
      <!-- 当前活动内容 -->
      <div class="col-md-9">
        <hr>
        <h3 class="link2"><svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-huodong"></use>
          </svg>
          活动内容 </h3>
        <!-- 活动内容，连数据库 -->
        <p id="act_content"></p>

        <hr>
        <h3 class="link2"><svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-zhaopian"></use>
          </svg>
          <span>活动照片 </h3>
        <img id="act_image" src="../../../images/pic1.png" class="img-responsive" style="width:100px,height:60px" alt="Responsive image">

        <hr>
        <h3 class="link2"><svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-huodong"></use>
          </svg>
          <span>购服务包 </h3>
        <div class="row">
          <div class="detail_item col-md-11 col-xs-12">
            <h4 id="service"><span class=""> </span></h4>
            <!-- 连接数据库得服务包信息 -->
            <hr>
            <h4>注意：选购付费服务包前须保证余额充足！</h4>
            <h4>会员可免费享有所有服务包~~</h4>
            <a href="../selfInformation/buyVip.php" target="_blank" class="btn btn-default btn_charge"> 点击充值</a></h4>
            <button type="button" class="btn btn-primary" id="buy_service"> 购买服务包 </button>
          </div>
        </div>

        <hr>
        <h3 class="link2"><svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-shixiang"></use>
          </svg>
          <span>具体事项 </h3>
        <div class="row">
          <div class="detail_item col-md-11 col-xs-12">
            <!-- 连数据库 -->
            <h4>活动地点：<span class="act_detail"> </span></h4>
            <h4>活动开始时间：<span class="act_detail"> </span></h4>
            <h4>活动结束时间：<span class="act_detail"> </span></h4>
            <h4>参与人数：<span class="act_detail"> </span></h4>
            <button type="button" class="btn btn-primary" id="sign_up"> 立即报名 </button>
          </div>
        </div>
      </div> <!-- 当前活动结束 -->
      <!-- </div> -->

      <!-- 往期活动 -->
      <div class="col-md-3">
        <hr>
        <h3 class="link2" id="oldAct"><svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-wangqihuigu"></use>
          </svg>
          <span>往期活动 </h3>
        <!-- 连接数据库 -->
      </div><!-- 往期活动结束 -->
    </div><!-- flex end test-->

    <!--留言-->
    <div id="text" class="col-md-10 col-md-push-1 col-xs-12">
      <div class="col-md-8 col-xs-12">
        <hr>
        <h3 class="link2"><svg class="icon" aria-hidden="true">
            <use xlink:href="#icon-pinglun1"></use>
          </svg>
          <span>活动留言 </h3>
        <!--我的评论-->
        <form id="form_comm" method="post">
          <div id="my_comment" class="my-comment row">
            <div class="my-headportrait">
              <!--我的头像-->
              <img id="my_port" src="" class="img-responsive" alt="my-headportrait">
            </div>
            <div class="textarea-container">
              <input id="act_id" type="hidden" name="actId" value="">
              <textarea name="content" id="comm_content" cols="80" class="" rows="5" placeholder="请自觉遵守互联网相关的政策法规，严禁发布色情、暴力等言论。"></textarea>
              <button id="comm_submit" type="button" done="0" class="comment-submit">发表评论</button><br>
            </div>
          </div>
        </form>
        <!--我的评论结束-->

        <!--评论列表-->
        <div id="comment-list" class="comment-list">
          <!-- 连接数据库 -->
        </div>

      </div>
    </div>
    <!--留言结束-->
  </div>
  <!--container-->

  <!-- footer -->
  <div id="footer" class="row footer">
    <footer class="container footer-content col-md-12 col-xs-12">
      <p>杭州师范大学</p>
      <p>&copy; 2020</p>
    </footer>
  </div>

  <!-- 购买服务包模态框 -->
  <div class="modal fade" id="modal_buySer" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">购买服务包</h4>
        </div>
        <div class="modal-body">
          <form id="form_buySer" method="get">
            <div id="buy_info">请选择需要的服务包：</div>
            <hr>
            <div class="form-group" id="serv_list">
              <!-- <label for="serv_bao">服务包1 ￥价格 </label> -->
              <!-- 连接数据库获取服务包信息 -->
              <input type="checkbox" value="" id="serv_bao1" name="serv_bao">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">手滑了</button>
          <button type="button" class="btn btn-primary" id="btn_buy_serv">购买</button>
        </div>
      </div>
    </div>
  </div>

  <!-- 报名模态框 -->
  <div class="modal fade" id="modal_signup" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">报名</h4>
        </div>
        <div class="modal-body">
          <form id="form_signup" method="get">
            <input id="form_v" type="hidden" name="act_id" value="">
          </form>
          <div id="buy_info">确定报名吗？</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">手滑了</button>
          <button type="button" class="btn btn-primary" id="btn_sign_up">确定</button>
        </div>
      </div>
    </div>
  </div>


  <!-- JavaScript -->
  <script src="../../../js/jquery-1.10.2.js"></script>
  <script src="../../../js/bootstrap.js"></script>
  <script src="http://at.alicdn.com/t/font_1720545_tymu1d14pug.js"></script>
  <script src="../../../js/ajax/activityInfo.js"></script>

</body>

</html>