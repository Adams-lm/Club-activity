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
    <link href="../../../css/bootstrap-theme.css" rel="stylesheet">
    <!-- sddr写的 -->
    <link rel="stylesheet" href="../../../css/mystyle_index_user.css">
    <link rel="stylesheet" type="text/css" href="../../../css/iconfont.css">
  </head>

  <body>
    <div class="container">
      <h1 class="mt-4 mb-3" style="margin-bottom:20px;">享受多彩活动 <small>VIP 你值得拥有</small></h1>

      <ol class="breadcrumb">
        <!-- 连接数据库得到余额 -->
        <li class="breadcrumb-item active">我的余额：<span id="getBalance">￥0.00</span></li>
        <li class="breadcrumb-item">
          <a href="#myModal" data-toggle="modal" data-target="#myModal">充值</a>
        </li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- 年费 -->
        <div class="col-md-4 col-xs-12">
          <div class="card col-lg-8 col-md-10 col-xs-10">
            <h3 class="card_header"></h3>
            <div class="card_body">
              <div id="price_year"></div><!-- 连接数据库动态显示价格 -->
              <div class="">per year</div>
            </div>
            <ul class="list-group">
              <li class="list-group-item">尊贵标志
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-VIP"></use></svg></li>
              <li class="list-group-item">岂止于大</li>
              <li class="list-group-item">唯一的不同，是处处都不同</li>
              <li class="list-group-item">
                <button type="button" class="btn btn-primary btn_buy" id="btn_buyYear"
                data-toggle="modal" data-target="#modal_buy" data-type="12">超值购买</button>
              </li>
            </ul>
          </div>
          <div class="alpha_shadow col-md-4 col-xs-2">
            <h3>年费</h3>
            <h3>V I P</h3>
          </div>
        </div>

        <!-- 季费 -->
        <div class="col-md-4 col-xs-12">
          <div class="card col-lg-8 col-md-10 col-xs-10">
            <h3 class="card_header"></h3>
            <div class="card_body_recommend">
              <div id="price_season"></div><!-- 连接数据库动态显示价格 -->
              <div class="">per season</div>
            </div>
            <ul class="list-group">
              <li class="list-group-item">尊贵标志
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-VIP"></use></svg></li>
              <li class="list-group-item">生活不止于眼前的氤氲</li>
              <li class="list-group-item">还有快乐社团</li>
              <li class="list-group-item">
                <button type="button" class="btn btn-primary btn_buy" id="btn_buySeason"
                data-toggle="modal" data-target="#modal_buy" data-type="3">推荐购买</button>
              </li>
            </ul>
          </div>
          <div class="alpha_shadow col-md-4 col-xs-2">
            <h3>季费</h3>
            <h3>V I P</h3>
          </div>
        </div>

        <!-- 月费 -->
        <div class="col-md-4 col-xs-12">
          <div class="card col-lg-8 col-md-10 col-xs-10">
            <h3 class="card_header"></h3>
            <div class="card_body">
              <!-- 连接数据库动态显示价格 -->
              <div id="price_month"></div>
              <div class="">per month</div>
            </div>
            <ul class="list-group">
              <li class="list-group-item">尊贵标志
                <svg class="icon" aria-hidden="true"><use xlink:href="#icon-VIP"></use></svg></li>
              <li class="list-group-item">多一点热爱</li>
              <li class="list-group-item">我要做会员</li>
              <li class="list-group-item">
                <button type="button" class="btn btn-primary btn_buy" id="btn_buyMonth" 
                data-toggle="modal" data-target="#modal_buy" data-type="1">短期购买</button>  
              </li>
            </ul>
          </div>
          <div class="alpha_shadow col-md-4 col-xs-2">
            <h3>月费</h3>
            <h3>V I P</h3>
          </div>
        </div>
      </div> 
    </div><!-- .container -->
    
    <!-- 充值模态框 -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">充值中心</h4>
          </div>
          <div class="modal-body">
            <form id="form_input" method="post">
              <div class="form-group">
                <label for="recharge" class="control-label">请输入充值金额:</label>
                <input type="text" class="form-control" id="recharge" name="money">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">手滑了</button>
            <button type="button" class="btn btn-primary" id="btn_submit">确认充值</button>
          </div>
        </div><!-- modal-content -->
      </div>
    </div>

    <!-- 购买会员模态框 -->
    <div class="modal fade" id="modal_buy" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">VIP中心</h4>
          </div>
          <div class="modal-body">
            <form id="form_upgrade" method="post">
            </form>
            <div  id="buy_info"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_upgrade">升级为VIP</button>
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript -->
    <script src="../../../js/jquery-1.10.2.js"></script>
    <script src="../../../js/bootstrap.js"></script>
    <script src="http://at.alicdn.com/t/font_1720545_tymu1d14pug.js"></script>
    <script src="../../../js/ajax/buyVip.js"></script>
    
  </body>
</html>
