<?php
    include("conn.php");
    include("functions.php");
    $serciceId=$_GET["serviceId"];
    $sql="delete from service where service_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$serciceId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","服务包删除成功!");
    }
    else{
        page_redirect(0,"","服务包删除失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>