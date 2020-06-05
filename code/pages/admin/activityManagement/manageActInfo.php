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
      <li class="active"> 管理活动信息</li>
    </ol>
  </div>

  <!-- 占行清除浮动 -->
  <div class="row"></div>

  <!-- 活动列表 -->
  <div id="list"></div>

  <!-- echart显示活动报名情况 -->
  <div class="col-md-12 ">
    <button class="btn btn-primary right" id="clickButton">
      查看活动报名情况
  </div>

  <!-- 占行清除浮动 -->
  <div class="row bottom"></div>

  <!-- 显示echart -->
  <div class="col-md-12 invisible" id="toggle">
    <!-- 这里直接用toggle控制display有bug 图表无法显示 用invisible代替 -->
    <div id="mychart" class="chart"></div>
  </div>

  <!-- 模拟点击按钮 -->
  <div class="row" style="display:none">
    <button type="button" class="btn btn-primary right" data-toggle="modal" data-target=".bs-example-modal-md" id="test">查看活动情况
    </button>
  </div>

  <!-- 点击echart跳出活动报名详情模态框 -->
  <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;
          </button>
          <h4 class="modal-title" id="myModalLabel">
            活动报名详情
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
                    <th class="center col-md-4 col-sm-4">报名成员 <i class="fa fa-sort"></i></th>
                    <th class="center col-md-4 col-sm-4">购买服务包 <i class="fa fa-sort"></i></th>
                    <th class="center col-md-4 col-sm-4">签到情况 <i class="fa fa-sort"></i></th>
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


  <!-- JavaScript -->
  <script src="../../../js/jquery-3.4.1.min.js"></script>
  <script src="../../../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>

  <!-- tablesort -->
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>

  <!-- echart -->
  <script src="../../../js/echarts-en.min.js"></script>
  <script src="../../../js/macarons.js"></script>

  <!-- ajax 活动列表 图表显示 点击显示报名情况 -->
  <script src="../../../js/ajax/manageActInfo.js"></script>

</body>

</html>