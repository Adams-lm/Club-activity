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
      <li class="active"><i class="fa fa-font"></i> 发布社团活动</li>
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
          </tr>
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
    <button class="btn btn-primary right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      创建新的社团活动
  </div>
  <!-- 占行 -->
  <div class="row bottom"></div>

  <div class="collapse" id="collapseExample">
    <div class="col-md-12 ">
      <div class="card box">
        <div class="left">
          <form class="form-horizontal" style='margin:15px auto' action="../../../php/addActivity.php" method="post">
            <div class="form-group">
              <label for="actName" class="col-md-3 control-label ">活动名称</label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="actName" name="actName" placeholder="请输入活动名称">
              </div>
            </div>
            <div class="form-group">
              <label for="startTime" class="col-md-3 control-label">开始时间</label>
              <div class="col-md-7">
                <input type="datetime-local" class="form-control" id="startTime" name="startTime" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="endTime" class="col-md-3 control-label">结束时间</label>
              <div class="col-md-7">
                <input type="datetime-local" class="form-control" id="endTime" name="endTime" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="status" class="col-md-3 control-label">活动状态</label>
              <div class="col-md-7" style="padding-top:6px">
                <input type="radio" name="status" value="1" checked=checked>上线 &nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="status" value="0">下线
              </div>
            </div>
            <div class="form-group">
              <label for="signUp" class="col-md-3 control-label">报名状态</label>
              <div class="col-md-7" style="padding-top:6px">
                <input type="radio" name="signUp" value="1" checked=checked>开始 &nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="signUp" value="0">结束
              </div>
            </div>
            <div class="form-group">
              <label for="content" class="col-md-3 control-label">活动内容</label>
              <div class="media-btn col-md-7" style="padding-top:7px">
                <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                <br>
                <div class="form-btn onlyright">
                  <button type="submit" class="btn btn-success" id="submit">创建</button>
                  <button type="reset" class="btn btn-default">取消</button>
                </div>
              </div>
            </div>
        </div>
        <div class="right">
          <strong>活动照片</strong>
          <label>
            <img src="../../../upload/default.jfif" width="352px" height="191px" id="image"  class="media-photo" name="image">
            <iframe src="upload.php" style="height:auto"></iframe>
          </label>
        </div>
        </form>
      </div>
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
        str += "</tr>";
      });
      $("#list").html(str);
      $("#tableList").trigger("update");
    });
    $(function() {
      $("#tableList").tablesorter();
    });
  </script>

</body>

</html>