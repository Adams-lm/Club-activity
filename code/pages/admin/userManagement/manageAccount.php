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
      <li class="active">管理在册用户</li>
    </ol>
  </div>

  <!-- 占行清除浮动 -->
  <div class="row"></div>
  
  <!-- 用户列表 -->
  <div class="table-responsive center">
    <div class="border-media-col-md-10 col-md-12">
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

  <!-- 状态提示信息 -->
  <div class="col-md-12 ">
    <a class="btn my-success"></a>&nbsp;VIP会员&nbsp;&nbsp;
    <a class="btn my-danger"></a>&nbsp;禁用中
  </div>

  <!-- echart显示社团成员情况 -->
  <div class="col-md-12 ">
    <button class="btn btn-primary right" id="clickButton">
      查看社团成员数据
  </div>

  <!-- 显示echart -->
  <div id="toggle" class="invisible">
    <!-- 这里直接用toggle控制display有bug 图表无法显示 用invisible代替 -->
    <div class="row">
      <div class="col-md-6 ">
        <div id="chartGender" class="chart"></div>
      </div>
      <div class="col-md-6 ">
        <div id="chartVIP" class="chart"></div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="../../../js/jquery-3.4.1.min.js"></script>
  <script src="../../../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>
  
  <!-- tablesort -->
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>

  <!-- 分页 -->
  <script src="../../../js/jquery.pagination.js"></script>

  <!-- echart -->
  <script src="../../../js/echarts-en.min.js"></script>
  <script src="../../../js/walden.js"></script>

  <!-- ajax获取用户列表 echart 图标 及控制显示 -->
  <script src="../../../js/ajax/manageAccount.js"></script>
  
</body>

</html>