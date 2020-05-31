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
  <h3 class="box2">活动信息修改</h3>
  <hr>
  <?php
  function Grade($time)
  {
    $newTime = explode(' ', $time);
    $time = $newTime[0] . 'T' . $newTime[1];
    return $time;
  }
  include "../../../php/conn.php";
  $actId = $_GET["actId"];
  $sql = "select * from activity where act_id = $actId";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql));
  $row['start_time'] = Grade($row['start_time']);
  $row['end_time'] = Grade($row['end_time']);

  ?>
  <div>
    <div class="col-md-10">
      <div class="card box">
        <div class="left">
          <form class="form-horizontal" style='margin:15px auto' action="../../../php/modifyActivity.php" method="post">
            <input type='hidden' name='actId' id="hidden" value="<?php echo $actId; ?>" />
            <div class="form-group">
              <label for="actName" class="col-md-3 control-label ">活动名称</label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="actName" name="actName" value="<?php echo $row['act_name']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="startTime" class="col-md-3 control-label">开始时间</label>
              <div class="col-md-7">
                <input type="datetime-local" class="form-control" id="startTime" name="startTime" value="<?php echo $row['start_time']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="endTime" class="col-md-3 control-label">结束时间</label>
              <div class="col-md-7">
                <input type="datetime-local" class="form-control" id="endTime" name="endTime" value="<?php echo $row['end_time']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="status" class="col-md-3 control-label">活动状态</label>
              <div class="col-md-7" style="padding-top:6px">
                <input type="radio" name="status" value="1" checked="checked">上线 &nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="status" value="0">下线
              </div>
            </div>
            <div class="form-group">
              <label for="signUp" class="col-md-3 control-label">报名状态</label>
              <div class="col-md-7" style="padding-top:6px">
                <input type="radio" name="signUp" value="1" checked="checked">开始 &nbsp&nbsp&nbsp&nbsp
                <input type="radio" name="signUp" value="0">结束
              </div>
            </div>
            <div class="form-group">
              <label for="content" class="col-md-3 control-label">活动内容</label>
              <div class="media-btn col-md-7" style="padding-top:7px">
                <textarea class="form-control" rows="5" id="content" name="content" value="<?php echo $row[2]; ?>"></textarea>
                <br>
                <div class="form-btn onlyright">
                  <button type="submit" class="btn btn-success" id="submit">修改</button>
                  <button type="reset" class="btn btn-default">取消</button>
                </div>
              </div>
            </div>
        </div>
        <div class="right">
          <strong>活动照片</strong>
          <label>
            <img src="<?php echo $row[7]; ?>" width="352px" height="191px" id="image" name="image">
            <iframe src="upload.php" style="height:auto"></iframe>
          </label>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- 占行 -->
  <div class="row bottom"></div>

  <div>
    <h3 class="box2">服务包管理</h3>
    <hr>
    <div class="table-responsive center">
      <div class="border-media-col-md-10 col-md-10">
        <table class="card table table-hover table-striped tablesorter">
          <thead>
            <tr>
              <th class="center">服务包名字 <i class="fa fa-sort"></i></th>
              <th class="center">价格 <i class="fa fa-sort"></i></th>
              <th class="center">服务包内容 <i class="fa fa-sort"></i></th>
              <th class="center">服务包状况 <i class="fa fa-sort"></i></th>
              <th class="center">操作 <i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody id="list">
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-10">
    <button type="button" class="btn btn-primary right" data-toggle="modal" data-target=".bs-example-modal-md">增加服务包
    </button>
  </div>
  <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;
          </button>
          <h4 class="modal-title" id="myModalLabel">
            增加服务包
          </h4>
        </div>
        <form id="form_data" class="form-horizontal" style='margin:15px auto' action="../../../php/addService.php" method="post">
          <input type='hidden' name='actId' value="<?php echo $actId; ?>" />
          <div class="modal-body">
            <div class="form-group">
              <label for="serviceName" class="col-md-3 control-label ">服务包名称</label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="serviceName" name="serviceName" placeholder="请输入服务包名称">
              </div>
            </div>
            <div class="form-group">
              <label for="price" class="col-md-3 control-label ">服务包价格</label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="price" name="price" placeholder="请输入服务包价格">
              </div>
            </div>
            <div class="form-group">
              <label for="content" class="col-md-3 control-label">服务包内容</label>
              <div class="media-btn col-md-7" style="padding-top:7px">
                <textarea class="form-control" rows="5" id="content" name="content" placeholder="请输入服务包内容"></textarea>
                <br>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">增加
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  <!-- JavaScript -->
  <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="../../../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>
  <script src="../../../js/morris-0.4.3.min.js"></script>
  <script src="../../../js/morris/chart-data-morris.js"></script>
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>
  <script src="../../../js/tablesorter/tables.js"></script>

  <script type="text/javascript">
    var actId = document.getElementById("hidden").value;
    $.post("../../../php/getServiceList.php?", {actId: actId}, function(data) {
      result = $.parseJSON(data);
      str = "";
      $.each(result, function(index, item) {
        str += "<tr>";
        str += "<td>" + item.service_name + "</td>";
        str += "<td>" + item.price + "</td>";
        str += "<td>" + item.content + "</td>";
        if (item.is_ban == "0")
          var status = "正常";
        else
          status = "禁用";
        str += "<td>" + status + "</td>";
        if (item.is_ban == 0)
          str += "<td>" + "<a class='btn btn-warning' href='../../../php/banService.php?serviceId="+ item.service_id +"'>"+"禁用"+"</a>";
        else
          str += "<td>" + "<a class='btn btn-success' href='../../../php/banService.php?serviceId="+ item.service_id +"'>"+"解禁"+"</a>";
        str += "&nbsp"+"<a class='btn btn-danger' href='../../../php/deleteService.php?serviceId="+ item.service_id +"'>"+"删除"+"</a>";
        str += "</td>";
      });
      $("#list").html(str);
    });
  </script>
</body>

</html>