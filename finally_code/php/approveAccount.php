<?php
    include("functions.php");
    $userId=$_GET["userId"];
    $status=1;
    include("conn.php");
    $sql="update user set status=? where user_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ii",$status,$userId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","审批通过!");
    }
    else{
        page_redirect(0,"","审批失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>