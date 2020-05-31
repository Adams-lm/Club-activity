<?php
    include("conn.php");
    include("functions.php");
    $actId=$_GET["actId"];
    $sql="delete from activity where act_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$actId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","活动删除成功!");
    }
    else{
        page_redirect(0,"","活动删除失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>