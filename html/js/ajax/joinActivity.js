$(document).ready(function(){
  str="";
  $.post("../../../php/getMyActivity.php","",function(data){
    data=$.parseJSON(data);
    $.each(data,function(index, item){
      str+='<div class="mycard col-md-5 col-xs-12">';
      //隐藏表单
      str+='<form id="form_qiandao" method="get" style="display:none">';
      str+='<input type="hidden" name="act_id" value="">';
      str+='</form>';
      str+='<div class="thumbnail img_three col-md-10 col-md-push-1 col-xs-5">';
      str+='<img src="'+item.image+'" class="img-responsive" alt="Responsive image">';
      str+='</div>';
      str+='<div class="caption col-md-12 col-xs-7">';
      str+='<h3>'+item.act_name+'</h3>';
      str+='<p>'+item.content+'</p>';
      str+='</div>';
      str+='<div class="act_label_three">';
      //状态按钮颜色
      btn='';
      //状态按钮提示语
      label="";
      // 控制签到按钮
      Qiandao=0;
      //活动状态
      if(item.online==0){
        btn="btn-danger";
        label="已截止";
      }else{
        if(item.pass==0){//报名申请
          btn="btn-warning";
          label="申请中";
        }else{
          if(item.is_sign==1){//已签到
            btn="btn-primary";
            label="已签到";
          }else{//报名成功
            btn="btn-success";
            label="报名成功";
            Qiandao=1;
          } 
        }
      }
      str+='<button class="btn_status btn btn-default '+btn+'">'+label+'</button>';
      if(Qiandao==1){
        str+='<button id="btn_qiandao" class="btn_status btn btn-info" data-actid=\
        "'+item.act_id+'">点击签到</button>';
      }
      str+='<a href="activityInfo.php?act_id='+item.act_id+'" target="_blank"class="btn btn-default" role="button" data-actid="'+item.act_id+'">更多';
      str+='<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>';
      str+='</div>';
      str+='</div>';
    });
    str+='<script>';
    str+='$("#btn_qiandao").click(function(){';
    str+='$("input[name=\'act_id\']").attr("value",$("#btn_qiandao").data("actid"));';
    str+='$("#form_qiandao").attr("action","../../../php/qiandao.php");';
    str+='$("#form_qiandao").submit();';
    str+='});';
    str+='<\/script>';
    $("#act_List").html(str);
  });
  
});