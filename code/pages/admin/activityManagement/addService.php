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
  <!-- sddr写的 -->
  <link rel="stylesheet" href="../../../css/mystyle_index.css">
  <!-- lm写的 -->
  <link rel="stylesheet" href="../../../css/mystyle_admin.css">
</head>

<body>
  <!-- 获取活动信息与世间进度条 -->
  <?php
  //处理时间，datetime-local格式中间为T，需要自行处理
  function Grade($time)
  {
    $newTime = explode(' ', $time);
    $time = $newTime[0] . 'T' . $newTime[1];
    return $time;
  }
  include "../../../php/conn.php";
  $actId = $_GET["actId"];
  $sql = "select *, (NOW()-start_time)/(end_time-start_time)*100 as percent,end_time<NOW() as end,start_time<NOW() as ready from activity where act_id = $actId";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql));
  $row['start_time'] = Grade($row['start_time']);
  $row['end_time'] = Grade($row['end_time']);
  ?>

  <!-- 顶部面包屑 -->
  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
      <li><a href="manageActInfo.php">管理活动信息</a></li>
      <li class="active">管理活动与服务包</li>
    </ol>
  </div>

  <!-- 占行清除浮动 -->
  <div class="row"></div>

  <!-- 活动时间进度条显示 -->
  <div class="col-md-12">

    <?php
    if ($row['status'] == 1) { //若活动在线
      if ($row['end'] == 1) { // 已结束
        echo "<h3 id='progress-animated'>活动已结束</h3>
                <div class='bs-example'>
                  <div class='progress progress-striped active'>
                    <div class='progress-bar progress-bar-warning'' style='width: 100%'></div>
                  </div>
                </div>";
      } else { //否则为未结束 分为进行中和未开始
        if ($row['ready'] == 1) { //进行中
          echo "<h3 id='progress-animated'>活动进行中</h3>
                  <div class='bs-example'>
                    <div class='progress progress-striped active'>
                      <div class='progress-bar progress-bar-success' style='width: $row[percent]%'></div>
                    </div>
                  </div>";
        } else { //否则未开始
          echo "<h3 id='progress-animated'>活动未开始</h3>
              <div class='bs-example'>
                <div class='progress progress-striped active'>
                  <div class='progress-bar  progress-bar-info' style='width: 100%'></div>
                </div>
              </div>";
        }
      }
    } else { //否则为下线
      echo "<h3 id='progress-animated'>活动已下线</h3>
            <div class='bs-example'>
              <div class='progress progress-striped active'>
                <div class='progress-bar progress-bar-danger' style='width: 100%'></div>
              </div>
            </div>";
    }
    ?>
  </div>

  <!-- 活动信息修改 -->
  <div class="col-md-12">
    <h3>活动信息修改</h3>
  </div>
  <div class="col-md-12">
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
              <?php
              if ($row['status'] == 1) {
                echo "<input type='radio' id='status'name='status' value='1' checked='checked'>上线 &nbsp&nbsp&nbsp&nbsp <input type='radio' name='status' value='0'>下线";
              } else {
                echo "<input type='radio' id='status' name='status' value='1'>上线 &nbsp&nbsp&nbsp&nbsp <input type='radio' name='status' value='0'  checked='checked'>下线";
              }
              ?>
            </div>
          </div>
          <div class="form-group">
            <label for="signUp" class="col-md-3 control-label">报名状态</label>
            <div class="col-md-7" style="padding-top:6px">
              <?php
              if ($row['sign_up'] == 1) {
                echo "<input type='radio' id='signUp' name='signUp' value='1' checked='checked'>开始 &nbsp&nbsp&nbsp&nbsp <input type='radio' name='signUp' value='0'>结束";
              } else {
                echo "<input type='radio' id='signUp' name='signUp' value='1'>开始 &nbsp&nbsp&nbsp&nbsp <input type='radio' name='signUp' value='0'  checked='checked'>结束";
              }
              ?>
            </div>
          </div>
          <div class="form-group">
            <label for="content" class="col-md-3 control-label">活动内容</label>
            <div class="media-btn col-md-7" style="padding-top:7px">
              <textarea class="form-control" rows="5" id="content" name="content"><?php echo $row['content']; ?></textarea>
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
          <img src="<?php echo $row[7]; ?>" width="322px" height="191px" id="image" class="media-photo" name="image">
          <iframe src="upload.php" style="height:auto"></iframe>
        </label>
      </div>
      </form>
    </div>
  </div>

  <!-- 服务包管理 -->
  <div>
    <div class="col-md-12">
      <h3>服务包管理</h3>
    </div>
    <!-- 占行清除浮动 -->
    <div class="row"></div>

    <div class="table-responsive center">
      <div class="border-media-col-md-10 col-md-12">
        <table class="card table table-hover table-striped tablesorter" id="tableList">
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

  <!-- 增加服务包模态框触发 -->
  <div class="col-md-12" style="padding-bottom:15px">
    <button type="button" class="btn btn-primary right" data-toggle="modal" data-target=".bs-example-modal-md" >增加服务包
    </button>
  </div>
  
  <!-- 增加服务包模态框 -->
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
        <!-- 隐藏传参 -->
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
  <script src="../../../js/jquery-3.4.1.min.js"></script>
  <script src="../../../js/bootstrap.js"></script>

  <!-- Page Specific Plugins -->
  <script src="../../../js/raphael-min.js"></script>

  <!-- tablesort -->
  <script src="../../../js/tablesorter/jquery.tablesorter.js"></script>

  <!-- ajax获取服务包数据 -->
  <script src="../../../js/ajax/addService.js"></script>
</body>

</html>