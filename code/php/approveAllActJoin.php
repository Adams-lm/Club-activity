<?php
    include("functions.php");
    $status = 1;
    include("conn.php");
    $sql="update activity_join set status=? where status=0";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$status);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","所有申请均已审批通过!");
    }
    else{
        page_redirect(1,"","审批失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>