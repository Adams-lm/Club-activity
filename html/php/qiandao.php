<?php
    header("Content-type:text/html;charset=utf-8");
    include("functions.php");
    session_start();
    $userId=$_SESSION["userId"];
    $actId=$_GET["act_id"];
    include("conn.php");
    //是否在签到时间
    $sql_jud="select * from activity where sign_up=0 and end_time>now() and act_id=?";
    $stmt_jud=mysqli_prepare($conn,$sql_jud);
    mysqli_stmt_bind_param($stmt_jud,"i",$actId);
    mysqli_stmt_execute($stmt_jud);
    $rs_jud=mysqli_stmt_get_result($stmt_jud);
    //允许签到
    if(mysqli_fetch_array($rs_jud)){
        page_redirect(0,"","没有到签到时间！");
    }else{
      $sql="update activity_join set is_sign=1 where act_id=? and user_id=?";
      $stmt=mysqli_prepare($conn,$sql);
      mysqli_stmt_bind_param($stmt,"ii",$actId,$userId);
      mysqli_stmt_execute($stmt);
      if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","签到成功!");
      }else{
        page_redirect(0,"","签到失败!");
      }
    }

    mysqli_stmt_close($stmt_jud);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>