<?php
    include("conn.php");
    include("functions.php");
    $serviceName=$_POST["serviceName"];
    $actId=$_POST["actId"];
    $price=$_POST["price"];
    $content=$_POST["content"];

    if($serviceName==null) page_redirect(0,"","服务包名字不能为空！");
    if($price==null) page_redirect(0,"","服务包价格不能为空！");
    if($price<0) page_redirect(0,"","服务包价格不能为负！");
    if($content==null) page_redirect(0,"","服务包内容不能为空！");
    
    $sql="INSERT INTO service (service_name,act_id,price,content) VALUES (?,?,?,?);";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"siss",$serviceName,$actId,$price,$content);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","服务包添加成功！");
    }
    else{
        page_redirect(0,"","服务包添加失败！请输入正确的价格！！！");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>