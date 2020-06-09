$(document).ready(function(){
  //获取当前用户信息
  var pwd=""; 
  $.ajax({
    url: '../../../php/getUserInfo.php',
    success: function(data){
      data = $.parseJSON(data);
      $("#account").val(data[0].account);
      $("#password").val("1234Aa");
      $("#username").val(data[0].user_name);
      if(data[0].gender=="男"){
        $("input[value='男']").prop("checked");
      }else{
        $("input[value='女']").prop("checked");
      }
      $("#balance").val("￥"+data[0].balance);
      $("#image").attr("src",data[0].image);
      $("#image_input").attr("value",data[0].image);
      pwd=data[0].password;
    }
  });
  //充值
  $("#charge").click(function(){
    window.location="buyVip.php";
  });
  //提交修改
  $("#btn_sure").click(function(){
    if(!$("#password").val() || !$("#username").val()){
      alert("用户名和密码不能为空！");
      return;
    }
    if(!passPwd($("#password").val()) || !passName($("#username").val())){
      alert("用户名或密码无效！");
      return;
    }
    $("#form_update").attr("action","../../../php/modifyUser.php");
    $("#form_update").submit();
  });
  //输入校验
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