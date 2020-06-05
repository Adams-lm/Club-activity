//活动列表
$.post("../../../php/getActivityList.php", "", function (data) {
  result = $.parseJSON(data);
  str = "";

  $.each(result, function(index, item) {
    str += "<div class='col-md-3 padding-right-bottom'>";
    str += "<div class='my-border'>";
    str += "<div class='center'>";
    str += "<h3>" + item.act_name + "</h3>";
    str += "</div>"
    str += "<div class='pad15'>";
    str += "<a href='addService.php?actId=" + item.act_id + "'>";
    str += "<img src='" + item.image + "'class='photo200' >";
    str += "</a>";
    str += "</div>";
    str += "<div class='ope'>";
    if (item.status == 1) {
      //已结束
      if (item.end == 1) {
        item.status = "已结束";
        str += "<div style='float:left;'><p class='btn my-warning'>已结束</p> </div>";
      } else {
        //进行中
        //已开始
        if (item.ready == 1) {
          item.status = "进行中";
          str += "<div style='float:left;'><p class='btn my-success'>进行中</p> </div>";
        } else {
          item.status = "未开始";
          str += "<div style='float:left;'><p class='btn my-primary'>未开始</p> </div>";
        }
      }
    } else {
      //下线
      item.status = "已下线";
      str += "<div style='float:left;'><p class='btn my-danger'>已下线</p> </div>";
    }
    str += "<div style='float:right;'>";
    str += "<a class='btn btn-info' href='addService.php?actId=" + item.act_id + "'>管理活动与服务包</a> &nbsp;<a class='btn btn-danger' href='../../../php/deleteActivity.php?actId=" + item.act_id + "'>删除</a>";
    str += "</div> <div style='clear:both'></div></div></div></div>";

  });
  $("#list").html(str);
  $("#tableList").trigger("update");
});
$(function() {
  $("#tableList").tablesorter();
});

//   图表的显示
$.get("../../../php/getActJoinNum.php", "", function(data) {
  data = $.parseJSON(data);
  var arr1 = [];
  if (data) {
    for (var i = 0; i < data.length; i++) {
      arr1.push(data[i].name);
    }
  }
  var myChart = echarts.init(document.getElementById('mychart'), 'macarons');

  option = {
    title: {
      text: '活动报名人数统计表',
      subtext: '点击查看详情信息',
      left: 'center'
    },
    tooltip: {
      trigger: 'item',
      formatter: '{a}{b} : {c} ({d}%)'
    },
    legend: {
      orient: 'horizontal',
      left: 'center',
      top: 'bottom',
      formatter: '{name}',
      data: data.name
    },
    series: [{
      name: '',
      type: 'pie',
      radius: '55%',
      center: ['50%', '60%'],
      data: data,
      emphasis: {
        itemStyle: {
          shadowBlur: 10,
          shadowOffsetX: 0,
          shadowColor: 'rgba(0, 0, 0, 0.5)'
        }
      }
    }]
  };

  myChart.setOption(option);

  // 点击后的触发 显示报名情况
  myChart.on('click', function(param) {

    // console.log(param.data.id);

    //给点击事件传参
    $('#test').click(function(event, arg1) {
      //先赋值
      $('#hidden').val(arg1);

      //然后获取数据
      var actId = document.getElementById("hidden").value;
      $.post("../../../php/getSignUp.php?", {
        actId: actId
      }, function(data) {
        result = $.parseJSON(data);
        str = "";
        $.each(result, function(index, item) {
          var status = "";
          if (item.is_sign == "已签到")
            str += "<tr class='success'>";
          else
            str += "<tr>";
          str += "<td>" + item.user_name + "</td>";
          str += "<td>" + item.service_name + "</td>";
          str += "<td>" + item.is_sign + "</td>";
          str += "</tr>";
        });
        $("#SignUplist").html(str);
        $("#tableList2").trigger("update");
      });
      $(function() {
        $("#tableList2").tablesorter();
      });
    });

    //触发模态框点击事件
    $("#test").trigger('click', param.data.id);
  });
});

//控制图表隐藏于显示
$("#clickButton").click(function() {
  // $("#toggle").toggle();//显示时点击为隐藏，隐藏时点击为显示
  if ($("#toggle").css("visibility") != "hidden") {
    $("#toggle").css("visibility", "hidden");
  } else {
    $("#toggle").css("visibility", "visible");
  };
});