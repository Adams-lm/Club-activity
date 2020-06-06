<?php
    session_start();
    include("functions.php");
    $actName=$_POST["actName"];
    $content=$_POST["content"];
    $startTime=$_POST["startTime"];
    $endTime=$_POST["endTime"];
    $image="../../../upload/default.jfif";//默认头像
    $address=$_POST["address"];
    include("conn.php");
    if(isset($_SESSION["image"])){
        $image=$_SESSION["image"];
    }
    session_destroy();

    $sql="INSERT INTO activity (act_name,content,start_time,end_time,image,address) VALUES (?,?,?,?,?,?);";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ssssss",$actName,$content,$startTime,$endTime,$image,$address);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","活动创建成功");
    }
    else{
        page_redirect(0,"","活动创建失败");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
