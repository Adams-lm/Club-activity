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
  <!-- sddr写的 -->
  <link rel="stylesheet" href="../../../css/mystyle_index.css">
  <!-- lm写的 -->
  <link rel="stylesheet" href="../../../css/lm.css">
</head>

<body>
  <div class="table-responsive center">
    <div class="border-media-col-md-10 col-md-10">
      <table class="card table table-hover table-striped tablesorter" id="tableList">
        <thead>
          <tr>
            <th class="center">头像 <i class="fa fa-sort"></i></th>
            <th class="center">账号 <i class="fa fa-sort"></i></th>
            <th class="center">用户名 <i class="fa fa-sort"></i></th>
            <th class="center">性别 <i class="fa fa-sort"></i></th>
            <th class="center">用户身份 <i class="fa fa-sort"></i></th>
            <th class="center">用户状态 <i class="fa fa-sort"></i></th>
            <th class="center">操作 <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody id="list">
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-md-10 ">
    <a class="btn my-success"></a>&nbsp;VIP会员&nbsp;&nbsp;
    <a class="btn my-danger"></a>&nbsp;禁用中
  </div>

  <div class="col-md-10 ">
    <button class="btn btn-primary right" id="clickButton" >
      查看社团成员数据
  </div>
  <!-- 占行 -->
  <!-- <div class="row bottom"></div> -->

  <div id="toggle" class="invisible">
    <div class="row">
      <div class="col-md-5 ">
        <div id="chartGender" class="chart"></div>
      </div>
      <div class="col-md-5 ">
        <div id="chartVIP" class="chart"></div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="../../../js/jquery-1.10.2.js"></script>
  <script src="../../../js/bootstrap.js"></script>
  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>
  <script src="../../../js/echarts-en.min.js"></script>
  <script src="../../../js/walden.js"></script>

  <script type="text/javascript">
    $.post("../../../php/getUser1List.php", "", function(data) {
      result = $.parseJSON(data);
      str = "";
      $.each(result, function(index, item) {
        if (item.image == null) item.image = "";
        if (item.is_vip == null) item.is_vip = "";
        if (item.is_vip == 1) item.is_vip = "VIP会员";
        else item.is_vip = "普通用户";
        if (item.status == 1) {
          item.status = "正常";
          if (item.is_vip == "VIP会员")
            str += "<tr class='success'>";
          else
            str += "<tr>";
          str += "<td>" + "<img src='" + item.image + "' width='50' height='50' alt=''>" + "</td>"
          // str += "<td>" + item.image + "</td>";
          str += "<td>" + item.account + "</td>";
          str += "<td>" + item.user_name + "</td>";
          str += "<td>" + item.gender + "</td>";
          str += "<td>" + item.is_vip + "</td>";
          str += "<td>" + item.status + "</td>";
          str += "<td>" + "<a class='btn btn-info' href='../../../php/resetPassword.php?userId=" + item.user_id + "'>" + "重置密码" + "</a>";
          str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/banAccount.php?userId=" + item.user_id + "'>" + "禁用" + "</a>";
          str += "</td>";
          str += "</tr>";
        } else {
          item.status = "禁用中";
          str += "<tr class='danger'>";
          str += "<td>" + "<img src='" + item.image + "' width='50' height='50' alt=''>" + "</td>"
          // str += "<td>" + item.image + "</td>";
          str += "<td>" + item.account + "</td>";
          str += "<td>" + item.user_name + "</td>";
          str += "<td>" + item.gender + "</td>";
          str += "<td>" + item.is_vip + "</td>";
          str += "<td>" + item.status + "</td>";
          str += "<td>" + "<a class='btn btn-info' href='../../../php/resetPassword.php?userId=" + item.user_id + "'>" + "重置密码" + "</a>";
          str += "&nbsp" + "<a class='btn btn-warning' href='../../../php/banAccount.php?userId=" + item.user_id + "'>" + "解禁" + "</a>";
          str += "</td>";
          str += "</tr>";
        }
      });
      $("#list").html(str);
      $("#tableList").trigger("update");
    });
    $(function() {
      $("#tableList").tablesorter();
    });
  </script>
  <!-- 性别图表 -->

  <script type="text/javascript">
  
    $.get("../../../php/getGenderNum.php", "", function(data) {
      data = $.parseJSON(data);

      // 指定图表的配置项和数据
      option = {
        title: {
          padding: 100,
          text: '社团成员性别统计表',
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
          name: '性别:',
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

      // 使用刚指定的配置项和数据显示图表。
      var myChart = echarts.init(document.getElementById('chartGender'),'walden');
      myChart.setOption(option);
    });
  </script>

  <!-- 性别图表 -->
  <script type="text/javascript">
    $.get("../../../php/getVipNum.php", "", function(data) {
      data = $.parseJSON(data);
      var myChart = echarts.init(document.getElementById('chartVIP'),'walden');

      // 指定图表的配置项和数据
      option = {
        title: {
          padding: 100,
          text: '社团成员VIP会员统计表',
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
          formatter: {
            name
          },
          data: data.name
        },
        series: [{
          name: '0:',
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

      // 使用刚指定的配置项和数据显示图表。
      myChart.setOption(option);
    });
  </script>

  <script type="text/javascript">

    $("#clickButton").click(function(){
      // $("#toggle").toggle();//显示时点击为隐藏，隐藏时点击为显示
      $('#toggle').css("visibility","visible");
    });
  </script>
    
</body>

</html>