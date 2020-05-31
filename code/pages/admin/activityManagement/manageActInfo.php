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
  <link rel="stylesheet" href="../../../css/morris-0.4.3.min.css">
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
  <script src="../../../js/morris-0.4.3.min.js"></script>
  <script src="../../../js/morris/chart-data-morris.js"></script>
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>
  <script src="../../../js/tablesorter/tables.js"></script>

  <script type="text/javascript">
    $.post("../../../php/getActivityList.php", "", function(data) {
      result = $.parseJSON(data);
      str = "";
      $.each(result, function(index, item) {
        if (item.status == 1) {
          item.status = "上线";
        } else {
          item.status = "下线";
        }
        str += "<tr>";
        str += "<td>" + item.act_name + "</td>";
        str += "<td>" + item.start_time + "</td>";
        str += "<td>" + item.end_time + "</td>";
        str += "<td>" + item.status + "</td>";
        str += "<td><a href='addService.php?actId=" + item.act_id + "'>管理活动与服务包</a></td>";
        str += "</tr>";
      });
      $("#list").html(str);
    });
  </script>
</body>

</html>