$(document).ready(function(){
  //输出当前各类型vip价格
  $.ajax({
    url: '../../../php/getPrice.php',
    success: function(data){
      data=data.split(' ');
      $("#price_year").html("￥"+data[0]);
      $("#price_season").html("￥"+data[1]);
      $("#price_month").html("￥"+data[2]);
    }
  });
  // 输出当前用户余额
  $.ajax({
    url: '../../../php/getUserBalance.php',
    success: function(data){
      if(data!=null && data!=0){
        $("#getBalance").empty();
        $("#getBalance").html("￥"+data);
      }
    }
  });

  // $('#myModal').modal();
  //充值
  $("#recharge").blur(function(){
    jud_input();
  });

  $("#btn_submit").click(function(){
    if(jud_input()){
      $("#form_input").attr("action","../../../php/addBalance.php");
      $("#form_input").submit();
    }
  });
  //输入金额非负校验
  function jud_input(){
    if(!$("#recharge").val() || eval($("#recharge").val())<=0){
      $("#recharge").val("");
      $("#recharge").attr("placeholder","请输入大于0的有效金额！");
      return false;
    }
    return true;
  }
  //购买vip
  $(".btn_buy").click(function(){
    $("#buy_info").empty();
    var ty=""; 
    var tmp=$(this).data("type");
    //根据data-type确定vip类型
    if($(this).data("type")==1){
      ty="月费";
    }else if($(this).data("type")==3){
      ty="季费";
    }else if($(this).data("type")==12){
      ty="年费";
    }
    $("#buy_info").html("您确定购买<strong>"+ty+"VIP</strong>吗？");
    //提交空表达，执行对应操作
    $("#btn_upgrade").click(function(){
      $("#form_upgrade").attr("action","../../../php/buyVip.php?type="+tmp+"");
      $("#form_upgrade").submit();
    });
  });
});