<?php
    include("functions.php");
    $actName=$_POST["actName"];
    $content=$_POST["content"];
    $startTime=$_POST["startTime"];
    $endTime=$_POST["endTime"];
    $image=$_POST["image"];
    include("conn.php");

    $sql="INSERT INTO activity (act_name,content,start_time,end_time,image) VALUES (?,?,?,?,?);";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"sssss",$actName,$content,$startTime,$endTime,$image);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"","活动创建成功");
    }
    else{
        page_redirect(1,"","活动创建失败");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
