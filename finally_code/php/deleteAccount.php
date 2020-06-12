<?php
    include("conn.php");
    include("functions.php");
    $userId=$_GET["userId"];
    $sql="delete from user where user_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$userId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","已拒绝改用户申请");
    }
    else{
        page_redirect(0,"","失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>