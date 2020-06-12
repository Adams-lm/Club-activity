<?php
    include("conn.php");
    include("functions.php");
    $serciceId=$_POST["serviceId"];
    $serviceName=$_POST["serviceName"];
    // $actId=$_POST["actId"];
    //不确定活动id要不要改
    $price=$_POST["price"];
    $content=$_POST["content"];
    $sql="update service set service_name=?,price=?,content=? where service_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"sdsi",$serviceName,$price,$content,$serciceId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","服务包信息修改成功!");
    }
    else{
        page_redirect(0,"","服务包信息修改失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>