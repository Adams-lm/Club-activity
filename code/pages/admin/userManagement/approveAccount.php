<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>社团活动管理系统</title>


  <!-- Bootstrap core CSS -->
  <link href="../../../css/bootstrap.css" rel="stylesheet">
  <!-- Add custom CSS here -->
  <link href="../../../css/sb-admin.css" rel="stylesheet">
  <!-- icon_font -->
  <link rel="stylesheet" href="../../../fonts/font-awesome/css/font-awesome.min.css">
  <!-- 分页css -->
  <link rel="stylesheet" href="../../../css/pagination.css">
  <!-- sddr写的 -->
  <link rel="stylesheet" href="../../../css/mystyle_index.css">
  <!-- lm写的 -->
  <link rel="stylesheet" href="../../../css/mystyle_admin.css">
</head>

<body>

  <!-- 顶部面包屑 -->
  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
      <li class="active">审批注册用户</li>
    </ol>
  </div>

  <!-- 占行清除浮动 -->
  <div class="row"></div>

  <!-- 用户申请列表 -->
  <div class="table-responsive center">
    <div class="border-media-col-md-10 col-md-12">
      <table class="card table table-hover table-striped tablesorter" id="tableList">
        <thead>
          <tr>
            <th class="center col-md-2">头像 <i class="fa fa-sort"></i></th>
            <th class="center col-md-3">账号 <i class="fa fa-sort"></i></th>
            <th class="center col-md-3">用户名 <i class="fa fa-sort"></i></th>
            <th class="center col-md-1">性别 <i class="fa fa-sort"></i></th>
            <th class="center col-md-3">操作 <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody id="list">
        </tbody>
      </table>
    </div>
  </div>

  <!-- 全部通过 -->
  <div class="col-md-12 " id="approve">
    <a href="../../../php/approveAllAccount.php" class="btn btn-primary right" onclick="return approve();">一键通过</a>
  </div>
  <!-- 占行 -->
  <div class="row bottom"></div>

  <!-- JavaScript -->
  <script src="../../../js/jquery-3.4.1.min.js"></script>
  <script src="../../../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>

  <!-- tablesort -->
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>
  <!-- 分页 -->
  <script src="../../../js/jquery.pagination.js"></script>

  <!-- ajax获取注册用户 -->
  <script src="../../../js/ajax/approveAccount.js"></script>

</body>

</html>