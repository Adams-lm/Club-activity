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
    <!-- 侧边栏 -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <!-- icon_font -->
    <link rel="stylesheet" href="../fonts/font-awesome/css/font-awesome.min.css">
    <!-- sddr写的 -->
    <link rel="stylesheet" href="../css/login.css">

  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container sign-up-container">
        <form  method="post" id="form_signup">
          <h1>注   册</h1>
          <img src="../images/QQ.png" class="head_img"alt="头像">
          <input type="hidden" name="image" value="../images/QQ.png">
          <input type="text" id="account" name="account" placeholder="账号"/>
          <input type="password" id="password" name="password" placeholder="密码" />
          <div id="gender">
            <label for="gender"><input id="sexM" name="gender" type="radio" value="男" checked="checked"> 男 </label>  
            <label for="gender"><input id="sexF" name="gender" type="radio" value="女"> 女 </label> 
          </div>
          <input type="text" id="username" name="username" placeholder="用户名" />  
          <!-- 添加button类型，否则弹出框后会刷新 -->  
          <button type="button" id="signup_btn">注   册</button>
        </form>
      </div>

      <div class="form-container sign-in-container">
        <form  method="post" id="form_login">
          <h1>登   录</h1>
          <input type="text" id="account_login" name="account" placeholder="账号" />
          <input type="password" id="password_login"name="password" placeholder="密码" />
          <div id="q">
            <label for="identity"><input  name="identity" type="radio" value="admin" > 管理员 </label>  
            <label for="identity"><input  name="identity" type="radio" value="user"checked="checked"> 用户 </label> 
          </div>
          <div id="ident">
            <input type="text" id="passPhrase" name="passPhrase"placeholder="验证码">
            <img src="" id="passPhrase_img" alt="验证码">
          </div>
          <div id="question">
            <div><a href="#">忘记密码？</a></div>
            <div id="change_btn">看不清？换一张</div>
          </div>
          <!-- 添加button类型，否则弹出框后会刷新 -->
          <button type="button" id="login_btn">登   录</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>欢迎回来！</h1>
            <p>请登录，欢迎打开社团之窗~</p>
            <button class="ghost" id="signIn">登   录</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>你好朋友！</h1>
            <p>请填写信息，完成注册。</p>
            <button class="ghost" id="signUp">注   册</button>
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript -->
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/ajax/login.js"></script>

  </body>
</html>
