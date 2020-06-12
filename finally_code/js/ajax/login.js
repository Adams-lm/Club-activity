$(document).ready(function(){

    //动画效果
    $("#signUp").click(function(){
      $("#container").addClass("right-panel-active");
    });

    $("#signIn").click(function(){
      $("#container").removeClass("right-panel-active");
    });
    //////////////////////////////////////////登录
    ///不同环境可能显示不出验证码，若显示不出，可将下方验证码注释掉
    //获得验证码路径
    $.ajax({
      url: '../php/identifier.php',
      success: function(data){
        $("#passPhrase_img").attr("src", data);
      }
    });

    //看不清换一张
    $("#change_btn").click(function(){
      $.ajax({
        url: '../php/identifier.php',
        success: function(data){
          //法一：重载
          // $("#passPhrase_img").attr("src", data);
          // window.location.reload(); 
          //法二：骗浏览器
          $("#passPhrase_img").attr('src', data+ "?t=" + Math.random());
        }
      });
      
    });

    //验证并提交登录表单
    var arrayError_login=new Array("请输入账号！","请输入密码！","请输入验证码！");
    $("#login_btn").click(function(){
      //空字段校验
      if(!$("#account_login").val()){
        alert(arrayError_login[0]);
      }else if(!$("#password_login").val()){
        alert(arrayError_login[1]);
      }else if(!$("#passPhrase").val()){
        alert(arrayError_login[2]);
      }else{
        $("#form_login").attr("action", "../php/login.php");
        // 让form表单提交
        $("#form_login").submit();
      }
    });


    //////////////////////////////////////////注册
    var arrayError=new Array("账号无效！","密码无效！","用户名无效！");
    $("#signup_btn").click(function(){
      //空字段校验
      if(!$("#account").val()){
        alert(arrayError[0]);
      }else if(!$("#password").val()){
        alert(arrayError[1]);
      }else if(!$("#username").val()){
        alert(arrayError[2]);
      }else{
        $("#form_signup").attr("action", "../php/signup.php");
        // 让form表单提交
        $("#form_signup").submit();
      }
    });
    //账号校验
    $("#account").blur(function(){
      if(passAccount($(this).val())){
        $("#account").removeClass("invalid");
        $("#account").addClass("valid");
      }else{
        $("#account").removeClass("valid");
        $("#account").addClass("invalid");
        $("#account").val("");
        $("#account").attr("placeholder","4~16位，支持字母、数字和下划线");
      }
    });

    //密码校验
    $("#password").blur(function(){
      if(passPwd($(this).val())){
        $("#password").removeClass("invalid");
        $("#password").addClass("valid");
      }else{
        $("#password").removeClass("valid");
        $("#password").addClass("invalid");
        $("#password").val("");
        $("#password").attr("placeholder","6~16位，必须包含大小写字母和数字");
      }
    });

    //用户名校验
    $("#username").blur(function(){
      if(passName($(this).val())){
        $("#username").removeClass("invalid");
        $("#username").addClass("valid");
      }else{
        $("#username").removeClass("valid");
        $("#username").addClass("invalid");
        $("#username").val("");
        $("#username").attr("placeholder","4~16位，支持字母、数字和下划线");
      }
    });

    //账号正则，4到16位（字母s，数字，下划线，减号）
    function passAccount(tmp){
      var jud=/^[a-zA-Z0-9_-]{4,16}$/;
      if(tmp.match(jud)){
        return true;
      }
      return false;
    }
    //密码6~16位长度，必须包含大小写字母和数字
    function passPwd(tmp){
      var jud=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\S]{6,16}/;
      if(tmp.match(jud)){
        return true;
      }
      return false;
    }
    //用户名，4-16位字母,数字,汉字,下划线
    function passName(tmp){
      var jud=/^([\u4e00-\u9fa5]{2,8})|([A-Za-z0-9_]{4,16})|([a-zA-Z0-9_\u4e00-\u9fa5]{3,16})$/;
      if(tmp.match(jud)){
        return true;
      }
      return false;
    }
  });