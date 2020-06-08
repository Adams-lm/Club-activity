<?php
    header("Content-type:text/html;charset=utf-8");
    include("functions.php");
    session_start();
    $userId=$_SESSION["userId"];
    $actId=$_GET["act_id"];
    include("conn.php");
    //检查是否报名
    $sql_jud="select * from activity_join where user_id=? and act_id=?";
    $stmt_jud=mysqli_prepare($conn,$sql_jud);
    mysqli_stmt_bind_param($stmt_jud,"ii",$userId,$actId);
    mysqli_stmt_execute($stmt_jud);
    $rs_jud=mysqli_stmt_get_result($stmt_jud);
    //已申请报名
    if(mysqli_fetch_array($rs_jud)){
        page_redirect(0,"","您已申请报名！");
    }
    else{
        //没有申请过
        $sql="INSERT INTO activity_join (user_id,act_id) VALUES (?,?)";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"ii",$userId,$actId);
        mysqli_stmt_execute($stmt);
        if(mysqli_affected_rows($conn)>0){
            page_redirect(0,"","成功报名活动，请等待申请结果！");
        }
        else{
            page_redirect(0,"","活动报名失败！");
        }
    }
    mysqli_stmt_close($stmt_jud);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
