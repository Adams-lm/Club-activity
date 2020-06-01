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
  <!-- JavaScript -->
  <script src="../../../js/jquery-1.10.2.js"></script>
  <script src="../../../js/bootstrap.js"></script>
  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>
  <script type="text/javascript">
    $.post("../../../php/getUser1List.php", "", function(data) {
      result = $.parseJSON(data);
      str = "";
      $.each(result, function(index, item) {
        if(item.image==null) item.image="";
        if(item.is_vip==null) item.is_vip="";
        if(item.is_vip==1) item.is_vip="VIP会员";
        else item.is_vip="普通用户";
        if(item.status==1) {
          item.status="正常";
          if(item.is_vip=="VIP会员")
              str += "<tr class='success'>";
          else 
          str += "<tr>";
          str += "<td>"+"<img src='"+item.image+ "' width='50' height='50' alt=''>"+"</td>"
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
        }

        else {
          item.status="禁用中";
          str += "<tr class='danger'>";
          str += "<td>"+"<img src='"+item.image+ "' width='50' height='50' alt=''>"+"</td>"
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
    });
  </script>

</body>

</html>