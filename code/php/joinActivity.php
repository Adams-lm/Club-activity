<?php
    include("functions.php");
    $userId=$_SESSION["userId"];
    $actId=$_GET["actId"];
    include("conn.php");
    $sql="INSERT INTO activity_join (user_id,act_id) VALUES (?,?);";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ii",$userId,$actId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"","成功报名活动，请等待申请结果！");
    }
    else{
        page_redirect(1,"","活动报名失败！");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
