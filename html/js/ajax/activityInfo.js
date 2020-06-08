$(document).ready(function(){

  //活动id
  id=$("#act_title").attr("data-actid");
  var isonline=1;

  // audio的播放控制
  $("#start_music").click(function(){
    var player = $(".my_audio")[0]; /*jquery对象转换成js对象*/
    if (player.paused){ /*如果已经暂停*/
        player.play(); /*播放*/
    }else {
        player.pause();/*暂停*/
    }
  });

  //获取该活动id的信息，活动名，活动内容，活动图片，活动时间等
  $.get("../../../php/getActivityInfo.php",{act_id:id}, function(data){
    data = $.parseJSON(data);
    str = "";
    $("#act_title").html(data[0].act_name);
    $("#act_content").html(data[0].content);
    $("#act_image").attr("src",data[0].image);
    $(".act_detail").each(function(index){
      if(index==0) $(this).html(data[0].address);
      else if(index==1) $(this).html(data[0].start_time);
      else if(index==2) $(this).html(data[0].end_time);
    });
    //下线或结束报名，则不显示报名按钮
    if(data[0].status!=1 || data[0].sign_up!=1){
      $("#sign_up").hide();
    }

    if(data[0].status==0){
      isonline=0;
    }
    //活动下线，用户不能发表评论
    if(isonline==0){
      $("#my_comment").hide();
    }

  });

  //获取活动参与人数
  $.get("../../../php/getJoinNums.php",{act_id:id},function(data){
    data = $.parseJSON(data);
    $(".act_detail").each(function(index){
      if(index==3) $(this).html(data[0].num);
    });
  });

  //获取服务包
  $.get("../../../php/getServiceList.php?",{actId:id},function(data){
    str3="";
    str_servbao="";
    if(data==0){
      str3="<h4>暂无服务包</h4>";
      str_servbao='暂无服务包';
    }
    data = $.parseJSON(data);
    // alert();
    $.each(data,function(index,item){
      str3+='<h4>'+item.service_name+' ￥'+item.price+'：';
      str3+='<span > '+item.content+' </span></h4>';
      str_servbao+='<label for="serv_bao">'+item.service_name+' ￥'+item.price+'&emsp;</label>';
      str_servbao+='<input type="radio" value="'+item.service_id+'" id="serv_bao1" name="serviceId">';   
    });
    //网页展示
    $("#service").after(str3);
    //模态框选择展示
    $("#serv_list").html(str_servbao);
  });

  //弹出服务包模态框
  $("#buy_service").click(function(){
    $("#modal_buySer").modal();
  });

  //购买服务包
  $("#btn_buy_serv").click(function(){
    $("#form_buySer").attr("action","../../../php/buyService.php");
    $("#form_buySer").submit();
  });

  // 报名
  $("#sign_up").click(function(){
    $("#modal_signup").modal();
    //隐藏input赋值
    $("#form_v").attr("value",id);
  });
  //提交表单
  $("#btn_sign_up").click(function(){
    $("#form_signup").attr("action","../../../php/joinActivity.php");
    $("#form_signup").submit();
  });

  //获取往期活动
  $.get("../../../php/getOldActivity.php","",function(data){
    data = $.parseJSON(data);
    str3="";
    $.each(data,function(index,item){
      if(index<2){
        str3+='<div >';
        str3+='<h5>'+item.act_name+'</h5>';
        str3+='<img src="'+item.image+'" class="img-responsive"alt="">';
        str3+='</div>';
      }else{
        return;
      }
    });
    $("#oldAct").after(str3);
  });

  //获取评论的当前用户头像
  $.get("../../../php/getUserInfo.php","",function(data){
    data = $.parseJSON(data);
    $("#my_port").attr("src",data[0].image);
  });

  //获取评论
  str2 = "";
  $.get("../../../php/getCommentList.php",{actId:id},function(data){
    data = $.parseJSON(data);
    //没有留言
    if(!data[0]){
      $("#comment-list").html("<h4>暂无留言</h4>");
    }else{//展示留言列表
      var iscomment=0;
      $.each(data,function(index,item) {
        str2+='<div class="comment-list-item" scrollshow="true">';
        str2+='<div class="user-headportrait">';
        str2+='<a href="" class="my-headportrait">';
        str2+='<img class="" src="'+item.image+'" class="img-responsive" alt="user_headportrait"></a>';
        str2+='</div>';
        str2+='<div class="user-comment">';
        str2+='<div class="user-name">';
        str2+='<a href="" class="">'+item.user_name+' </a>';
        //判断用户是否为vip，是则显示尊贵标志
        $.ajax({
          url: "../../../php/isVip.php", 
          cache: false,                    //是否将文件缓存
          async:false,      //同步请求!!!!!很重要
          data: {user_id:item.user_id},          
          success: function(data){ 
            //购买了vip
            if(data==1){
              str2+='<svg class="icon" aria-hidden="true"><use xlink:href="#icon-VIP"></use></svg>';
            }
          },error:function(){
            console.log("失败"); 
          }  
        });
        str2+='</div>';
        str2+='<p class="text">'+item.content+'</p>';
        str2+='<div class="user-info">';
        str2+='<span class="time">'+item.time+'</span>';
        str2+='<svg class="icon" aria-hidden="true"><use xlink:href="#icon-zankongxingai"></use></svg>';
        str2+='<span> </span>';
        str2+='<svg class="icon" aria-hidden="true"><use xlink:href="#icon-cai"></use></svg>';
        str2+='</div>';
        str2+='</div>';
        str2+='</div>';
      });
      $("#comment-list").html(str2);
    }
  });

  //发表评论
  $("#act_id").attr("value",id);
  $("#comm_submit").click(function(){
    if(!$("#comm_content").val()){
      alert("评论内容不能为空！");
    }else{
      $("#form_comm").attr("action","../../../php/addComment.php");
      $("#form_comm").submit();
    }
    $("#comm_submit").attr("done",1);
  });
  //跳转后刷新
  // if($("#comm_submit").attr("done")==1){
  //  top.location.reload();
  // }
  
});