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

  <div class="col-md-10">
    <div class="table-responsive center">
      <table class="card table table-hover table-striped tablesorter">
        <thead>
          <tr>
            <th class="center">用户名 <i class="fa fa-sort"></i></th>
            <th class="center">申请账号 <i class="fa fa-sort"></i></th>
            <th class="center">活动名称 <i class="fa fa-sort"></i></th>
            <th class="center">所够买服务包 <i class="fa fa-sort"></i></th>
            <th class="center">用户身份 <i class="fa fa-sort"></i></th>
            <th class="center">操作 <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody id="list">
        </tbody>
      </table>
    </div>
  </div>

  
  <!-- JavaScript -->
  <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../../../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>
  <script src="../../../js/tablesorter/tables.js"></script>


  <script type="text/javascript">    
    $.post("../../../php/getActjoinList.php", "", function(data) {
      result = $.parseJSON(data);
      str = "";
      $.each(result, function(index, item) {
        str += "<tr>";
        str += "<td>" + item.user_name + "</td>";
        str += "<td>" + item.account + "</td>";
        str += "<td>" + item.act_name + "</td>";
        if(item.service_name==null)
        item.service_name="无";
        str += "<td>" + item.service_name + "</td>";
        str += "<td>" + item.is_vip + "</td>";
        str += "<td>" + "<a class='btn btn-success' href='../../../php/approveActJoin.php?userId="+ item.user_id +"'>"+"通过"+"</a>";
        str += "&nbsp"+"<a class='btn btn-danger' href='../../../php/refuseActJoin.php?userId="+ item.user_id +"'>"+"拒绝"+"</a>";
        str += "</td>";
        str += "</tr>";
      });
      $("#list").html(str);
    });
  </script>
</body>

</html>