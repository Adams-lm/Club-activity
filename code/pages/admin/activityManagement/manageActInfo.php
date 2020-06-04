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

  <!-- Add custom CSS here -->
  <link href="../../../css/sb-admin.css" rel="stylesheet"><!-- 侧边栏 -->
  <link rel="stylesheet" href="../../../fonts/font-awesome/css/font-awesome.min.css"><!-- icon_font -->
  <!-- Page Specific CSS -->
  <!-- sddr写的 -->
  <link rel="stylesheet" href="../../../css/mystyle_index.css">
  <!-- lm写的 -->
  <link rel="stylesheet" href="../../../css/mystyle_admin.css">
</head>

<body>
  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
      <li class="active"><i class="fa fa-font"></i> 管理活动信息</li>
    </ol>
  </div>
  <div class="row"></div> <!-- 占行清除浮动 -->
  <div class="table-responsive center">
    <div class="border-media-col-md-10 col-md-12">
      <table class="card table table-hover table-striped tablesorter" id="tableList">
        <thead>
          <tr>
            <th class="center">活动名称 <i class="fa fa-sort"></i></th>
            <th class="center">开始时间 <i class="fa fa-sort"></i></th>
            <th class="center">结束时间 <i class="fa fa-sort"></i></th>
            <th class="center">活动状态 <i class="fa fa-sort"></i></th>
            <th class="center">操作 <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        </thead>
        <tbody id="list">
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-12 ">
    <a class="btn my-success"></a>&nbsp;进行中&nbsp;&nbsp;
    <a class="btn my-warning"></a>&nbsp;未开始&nbsp;&nbsp;
    <a class="btn my-danger"></a>&nbsp;已下线&nbsp;&nbsp;
  </div>
  <div class="col-md-12 ">
    <button class="btn btn-primary right" id="clickButton">
      查看活动报名情况
  </div>

  <div class="row bottom"></div> <!-- 去浮动 -->

  <div class="col-md-12 invisible" id="toggle">
    <div id="mychart" class="chart"></div>
  </div>

  <!-- 测试传参 -->

  <!-- 模拟点击按钮 -->
  <div class="row" style="display:none">
    <button type="button" class="btn btn-primary right" data-toggle="modal" data-target=".bs-example-modal-md" id="test">查看活动情况
    </button>
  </div>

  <!-- 模态框 -->
  <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;
          </button>
          <h4 class="modal-title" id="myModalLabel">
            活动签到详情
          </h4>
        </div>
        <div class="modal-body">
          <!-- 隐藏传入了参数id -->
          <div class="row">
            <input type="hidden" class="form-control" id="hidden" name="hidden">
          </div>
          <div class="table-responsive center">
            <div class="border-media-col-md-10 col-md-12">
              <table class="card table table-hover table-striped tablesorter" id="tableList2">
                <thead>
                  <tr>
                    <th class="center">报名成员 <i class="fa fa-sort"></i></th>
                    <th class="center">购买服务包 <i class="fa fa-sort"></i></th>
                    <th class="center">签到情况 <i class="fa fa-sort"></i></th>
                  </tr>
                </thead>
                <tbody id="SignUplist">
                </tbody>
              </table>
            </div>
          </div>
          <div class="row">
            <button type="button" class="btn btn-default right maright" data-dismiss="modal">关闭
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 测试结束 -->

  <!-- JavaScript -->
  <script src="../../../js/jquery-1.10.2.js"></script>
  <script src="../../../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>
  <script src="../../../js/echarts-en.min.js"></script>

  <script src="../../../js/macarons.js"></script>

  <!-- 活动列表 -->
  <script type="text/javascript">
    $.post("../../../php/getActivityList.php", "", function(data) {
      result = $.parseJSON(data);
      str = "";
      $.each(result, function(index, item) {
        //在线
        if (item.status == 1) {
          //已结束
          if (item.end == 1) {
            item.status = "已结束";
            str += "<tr>";
          } else {
            //进行中
            //已开始
            if (item.ready == 1) {
              item.status = "进行中";
              str += "<tr class='success'>";
            } else {
              item.status = "未开始";
              str += "<tr class='warning'>";
            }

          }
        } else {
          //下线
          item.status = "已下线";
          str += "<tr class='danger'>";
        }
        str += "<td>" + item.act_name + "</td>";
        str += "<td>" + item.start_time + "</td>";
        str += "<td>" + item.end_time + "</td>";
        str += "<td>" + item.status + "</td>";
        str += "<td><a class='btn btn-info' href='addService.php?actId=" + item.act_id + "'>管理活动与服务包</a>";
        str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/deleteActivity.php?actId=" + item.act_id + "'>删除</a>";
        str += "</tr>";
      });
      $("#list").html(str);
      $("#tableList").trigger("update");
    });
    $(function() {
      $("#tableList").tablesorter();
    });
  </script>


  <!-- 图表的显示 -->
  <script type="text/javascript">
    $.get("../../../php/getActJoinNum.php", "", function(data) {
      data = $.parseJSON(data);
      var arr1 = [];
      if (data) {
        for (var i = 0; i < data.length; i++) {
          arr1.push(data[i].name);
        }
      }
      var myChart = echarts.init(document.getElementById('mychart'), 'macarons');
      // 指定图表的配置项和数据
      // 柱状图

      // option = {
      //   color: ['#3398DB'],
      //   title: {
      //           text: '活动报名统计'
      //       },
      //       tooltip: {
      //           show: true,
      //           trigger: 'item',
      //       },
      //       legend: {
      //           formatter: '{name}',
      //           data: data.name
      //       },
      //       xAxis: [{
      //         formatter: '{name}',
      //           data: arr1
      //       }],
      //       yAxis: [{
      //           type: 'value'
      //       }],
      //       series: [{
      //           "name": "活动",
      //           "type": "bar",
      //           "data": data
      //       }]
      //   };
      // 饼图
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

      // 点击后的触发
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
  </script>

  <!-- 控制图表隐藏于显示 -->
  <script type="text/javascript">
    $("#clickButton").click(function() {
      // $("#toggle").toggle();//显示时点击为隐藏，隐藏时点击为显示
      if ($("#toggle").css("visibility") != "hidden") {
        $("#toggle").css("visibility", "hidden");
      } else {
        $("#toggle").css("visibility", "visible");
      };
    });
  </script>


</body>

</html>