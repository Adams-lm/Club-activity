$(document).ready(function(){
  // audio的播放控制
  $("#start_music").click(function(){
    var player = $(".my_audio")[0]; /*jquery对象转换成js对象*/
    if (player.paused){ /*如果已经暂停*/
        player.play(); /*播放*/
    }else {
        player.pause();/*暂停*/
    }
  });

  //获得活动信息并展示
  $.post("../../../php/getActivity.php", "", function (data) {
    result = $.parseJSON(data);
    str = "";
    $.each(result, function (index, item) {
      //三图一行展示
      if(index<3){
        str+='<div class="mycard col-md-4 col-xs-12">';
        str+='<div class="thumbnail img_three col-md-10 col-md-push-1 col-xs-5">';
        str+='<img src="'+item.image+'" class="img-responsive" alt="Responsive image">';
        str+='</div>';
        str+='<div class="caption col-md-12 col-xs-7">';
        str+='<h3>'+item.act_name+'</h3>';
        str+='<p>'+item.content+'</p>';
        str+='</div>';
        str+='<div class="act_label_three">';
        btn='btn-primary';
        label='火爆';
        if(item.status==0){//下线
          btn='btn-danger';
          label='已下线';
        }else{
          if(item.sign_up==1){//报名进行时
            btn='btn-success';
            label='正在报名中';
          }else{//报名结束但未下线
            btn='btn-warning';
            label='报名结束';
          }
        }
        str+='<button class="btn_status btn '+btn+'">'+label+'</button>';
        str+='<a href="activityInfo.php?act_id='+item.act_id+'" class="trans_page btn btn-default" \
          target="_blank" role="button" data-status="'+item.act_id+'">更多 ';
        str+='<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>';
        str+='</div>';
        str+='</div>';
        //轮播图图片
        if(index==0) $("#carpic1").attr("src",item.image);
        else if(index==1) $("#carpic2").attr("src",item.image);
        else $("#carpic3").attr("src",item.image);
      }else{//一图一行
        str+='<div class="mycard col-md-12  col-xs-12 one_style">';
        str+='<div class="col-md-6">';
        str+='<img class="img-responsive" src="'+item.image+'" alt="">';
        str+='</div>';
        str+='<div class="col-md-6 one_right">';
        str+='<h2>'+item.act_name+'</h2>';
        str+='<p>'+item.content+'</p>';
        str+='<div class="act_label">';
        btn='btn-primary';
        label='火爆';
        if(item.status==0){//下线
          btn='btn-danger';
          label='已下线';
        }else{
          if(item.sign_up==1){//报名进行时
            btn='btn-success';
            label='正在报名中';
          }else{//报名结束但未下线
            btn='btn-warning';
            label='报名结束';
          }
        }
        str+='<button class="btn btn_status '+btn+'">'+label+'</button>';
        str+='<a href="activityInfo.php?act_id='+item.act_id+'" class="trans_page btn btn-default" \
          target="_blank" role="button" data-status="'+item.act_id+'">更多 ';
        str+='<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>';
        str+='</div>'; 
        str+='</div>'; 
        str+='</div>'; 
      }
    });
    $("#act_show").html(str);
  });
});