<?php
    include("conn.php");
    include("functions.php");
    $userId=$_GET["userId"];
    //改变 status 非1即-1
    $sql="update user set status=(status)*(-1) where user_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$userId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"../pages/admin/userManagement/manageAccount.php","用户禁用状态修改成功!");
    }
    else{
        page_redirect(0,"","用户禁用状态修改失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>