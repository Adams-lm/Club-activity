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
  <link rel="stylesheet" href="../../../css/lm.css">
</head>

<body>
  <div class="table-responsive center">
    <div class="col-md-10">

      <table class="card table table-hover table-striped tablesorter">
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
  <!-- JavaScript -->
  <script src="../../../js/jquery-1.10.2.js"></script>
  <script src="../../../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>

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
        str += "<td><a class='btn btn-primary' href='addService.php?actId=" + item.act_id + "'>管理活动与服务包</a>";
        str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/deleteActivity.php?actId=" + item.act_id + "'>删除</a>";
        str += "</tr>";
      });
      $("#list").html(str);
    });
  </script>
</body>

</html>