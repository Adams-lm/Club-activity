//活动列表
var pageIndex = 1;    //页面索引初始值   
var pageSize = 8;     //每页显示条数初始化，修改显示条数，修改这里即可   
var pageCount = 30;   //总的记录数，随便赋个初值好了，后面会重新赋值的 
$(document).ready(function () {
    // 得到要显示的总的记录数
    $.ajax({
        url: '../../../php/pageManageActInfo.php',
        async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
        type: 'POST',
        dataType: 'json',
        data: { index: '0', size: pageSize }, // 提交数据
        success: function (data) {
            pageCount = data.total;
        },
        error: function () {
            alert("error");
        }
    });

    InitTable(pageIndex);    //初始化表格数据
    InitPager();
});

function InitPager() {
    //分页，PageCount是总条目数，这是必选参数，其它参数都是可选
    $("#pager").pagination(pageCount, {
        callback: pageCallback,  //PageCallback() 为翻页调用次函数。
        prev_text: "上一页",
        next_text: "下一页",
        items_per_page: pageSize,
        num_edge_entries: 2,       //两侧首尾分页条目数
        num_display_entries: 3,    //连续分页主体部分分页条目数
        current_page: pageIndex - 1,   //当前页索引
        link_to: "javascript:void(0);"
    });
}
//翻页调用   
function pageCallback(index, jq) {
    InitTable(index + 1);
}
//请求数据   
function InitTable(pageIndex) {
    $.ajax({
        type: "POST",
        url: "../../../php/pageManageActInfo.php",
        dataType: "json",
        //提交两个参数：pageIndex(页面索引)，pageSize(显示条数)
        data: { index: pageIndex, size: pageSize },
        success: function (data) {
            var str = "";
            $.each(data, function () {
                str += "<div class='col-md-3 padding-right-bottom'>";
                str += "<div class='my-border'>";
                str += "<div class='center'>";
                str += "<h3>" + this['act_name'] + "</h3>";
                str += "</div>"
                str += "<div class='pad15'>";
                str += "<a href='addService.php?actId=" + this['act_id'] + "'>";
                str += "<img src='" + this['image'] + "'class='photo200' >";
                str += "</a>";
                str += "</div>";
                str += "<div class='center pad15'>";
                str += "<h5>" + this['address'] + "</h5>";
                str += "</div>"
                str += "<div class='ope'>";
                if (this['status'] == 1) {
                    //已结束
                    if (this['end'] == 1) {
                        this['status'] = "已结束";
                        str += "<div style='float:left;'><p class='btn my-warning'>已结束</p> </div>";
                    } else {
                        //进行中
                        //已开始
                        if (this['ready'] == 1) {
                            this['status'] = "进行中";
                            str += "<div style='float:left;'><p class='btn my-success'>进行中</p> </div>";
                        } else {
                            this['status'] = "未开始";
                            str += "<div style='float:left;'><p class='btn my-primary'>未开始</p> </div>";
                        }
                    }
                } else {
                    //下线
                    this['status'] = "已下线";
                    str += "<div style='float:left;'><p class='btn my-danger'>已下线</p> </div>";
                }
                str += "<div style='float:right;'>";
                str += "<a class='btn btn-info' href='addService.php?actId=" + this['act_id'] + "'>管理活动与服务包</a> &nbsp;<a class='btn btn-danger' href='../../../php/deleteActivity.php?actId=" + this['act_id'] + "' onclick= 'return myConfirm(\"确定要删除该活动吗？\");' >" + "删除" + "</a>";
                str += "</div> <div style='clear:both'></div></div></div></div>";
            });
            $("#list").html(str);
            $("#tableList").trigger("update");
        },
        error: function () {
            alert("error");
        }
    });
    //触发tablesort
    $(function () {
        $("#tableList").tablesorter();
    });
}

//   图表的显示
$.get("../../../php/getActJoinNum.php", "", function (data) {
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
  myChart.on('click', function (param) {

    // console.log(param.data.id);

    //给点击事件传参
    $('#test').click(function (event, arg1) {
      //先赋值
      $('#hidden').val(arg1);

      //然后获取数据
      var actId = document.getElementById("hidden").value;
      $.post("../../../php/getSignUp.php?", {
        actId: actId
      }, function (data) {
        result = $.parseJSON(data);
        str = "";
        $.each(result, function (index, item) {
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
      $(function () {
        $("#tableList2").tablesorter();
      });
    });

    //触发模态框点击事件
    $("#test").trigger('click', param.data.id);
  });
});

//控制图表隐藏于显示
$("#clickButton").click(function () {
  // $("#toggle").toggle();//显示时点击为隐藏，隐藏时点击为显示
  if ($("#toggle").css("visibility") != "hidden") {
    $("#toggle").css("visibility", "hidden");
  } else {
    $("#toggle").css("visibility", "visible");
  };
});

//自定义提示函数
function myConfirm(message)
{
    if(confirm(message))
        return true;
    else
        return false;
}