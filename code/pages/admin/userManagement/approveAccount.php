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
  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
      <li class="active"><i class="fa fa-font"></i> 审批注册用户</li>
    </ol>
  </div>
  <div class="row"></div> <!-- 占行清除浮动 -->
  <div class="table-responsive center">
    <div class="border-media-col-md-10 col-md-12">
      <table class="card table table-hover table-striped tablesorter" id="tableList">
        <thead>
          <tr>
            <th class="center">头像 <i class="fa fa-sort"></i></th>
            <th class="center">账号 <i class="fa fa-sort"></i></th>
            <th class="center">用户名 <i class="fa fa-sort"></i></th>
            <th class="center">性别 <i class="fa fa-sort"></i></th>
            <th class="center">操作 <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody id="list">
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-md-12 " id="approve">
    <a href="../../../php/approveAllAccount.php" class="btn btn-primary right">一键通过</a>
  </div>
  <!-- 占行 -->
  <div class="row bottom"></div>

  <!-- JavaScript -->
  <script src="../../../js/jquery-1.10.2.js"></script>
  <script src="../../../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>

  <script type="text/javascript">
    $.post("../../../php/getUser0List.php", "", function(data) {
      result = $.parseJSON(data);
      str = "";
      if (data != "[]") {
        $.each(result, function(index, item) {
          str += "<tr>";
          str += "<td>" + "<img src='" + item.image + "' width='50' height='50' alt=''>" + "</td>"
          // str += "<td>" + item.image + "</td>";
          str += "<td>" + item.account + "</td>";
          str += "<td>" + item.user_name + "</td>";
          str += "<td>" + item.gender + "</td>";
          str += "<td>" + "<a class='btn btn-success' href='../../../php/approveAccount.php?userId=" + item.user_id + "'>" + "通过" + "</a>";
          str += "&nbsp" + "<a class='btn btn-danger' href='../../../php/deleteAccount.php?userId=" + item.user_id + "'>" + "拒绝" + "</a>";
          str += "</td>";
          str += "</tr>";
        });
      } else {
        str = "<td colspan='5'><div class=' alert-success center' >没有需要审批的用户 </td></div>"
        $("#approve").hide();
      }
      $("#list").html(str);
      $("#tableList").trigger("update");
    });
    $(function() {
      $("#tableList").tablesorter();
    });
  </script>
</body>

</html>