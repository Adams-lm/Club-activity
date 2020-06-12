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
    <link rel="stylesheet" href="../../../css/updateInfo.css">
  </head>

  <body>
    
    <div class="row">
      <div class= "col-md-7 col-xs-10 col-xs-push-1 card">
        <form id="form_update" method="post">
          <!-- 左边信息栏 -->
          <div class="col-md-7 col-xs-12">
            <div class="form-group">
              <label for="account" class="col-md-3 control-label item">账号</label>
              <div class="col-md-9 item">
                <input type="text" class="form-control" id="account" name="account" disabled="disabled">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-md-3 control-label item">密码</label>
              <div class="col-md-9 item">
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="form-group">
              <label for="username" class="col-md-3 control-label item">用户名</label>
              <div class="col-md-9 item">
                <input type="text" class="form-control" id="username" name="username">
              </div>
            </div>
            <div class="form-group">
              <label for="gender" class="col-md-3 control-label  item">性别</label>
              <div class="col-md-9  item" style="padding-bottom:5px">
                <input type="radio" name="gender" value="男" checked=checked>男 &nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="gender" value="女">女
              </div>
            </div>
            <div class="form-group" >
              <label for="status" class="col-md-3 control-label item">状态</label>
              <div class="col-md-9 item" style="padding-bottom:5px">
                <input type="radio" name="status" value="1" checked=checked disabled="disabled">正常 &nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="status" value="0" disabled="disabled">禁用
              </div>
            </div>
            <div class="form-group">
              <label for="contbalanceent" class="col-md-3 control-label item" >余额</label>
              <div class="col-md-9 item">
                <input type="text" class="form-control" id="balance" name="balance"disabled="disabled">
              </div>
            </div>
          </div><!-- .col-md-7 左边信息栏 -->

          <!-- 右边头像 -->
          <div class="col-md-5 col-xs-12">
            <div class="col-xs-12 item">
              <label for="">
                <h5><strong>更新头像</strong></h5>
                <img class="img-responsive" src="" 
                  id="image" name="image"alt="头像" >
                  <input type="hidden"id="image_input" name="image_input" value="">
                <iframe class="col-md-12 col-xs-12" scrolling="no" src="upload.php"></iframe>
              </label>
            </div>
            <div class="btn_form col-xs-12 ">
              <button type="button" class="btn btn-primary" id="charge">充值</button>
              <button type="button" class="btn btn-success" id="btn_sure">修改</button>
            </div>
          </div>

        </form> 
      </div>
    </div>
    
    <!-- JavaScript -->
    <script src="../../../js/jquery-1.10.2.js"></script>
    <script src="../../../js/bootstrap.js"></script>
    <script src="../../../js/ajax/updateInfo.js"></script>
  </body>
</html>
