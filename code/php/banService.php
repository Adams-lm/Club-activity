<?php
    include("conn.php");
    include("functions.php");
    $serviceId=$_GET["serviceId"];
    //改变 is_ban 非1即0
    $sql="update service set is_ban=(is_ban-1)*(-1) where service_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$serviceId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","服务包禁用状态修改成功!");
    }
    else{
        page_redirect(0,"","服务包禁用状态修改失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>