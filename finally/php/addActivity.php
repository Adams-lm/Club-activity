<?php
    session_start();
    include("functions.php");
    $actName=$_POST["actName"];
    $content=$_POST["content"];
    $startTime=$_POST["startTime"];
    $endTime=$_POST["endTime"];
    $address=$_POST["address"];
    $image="../../../upload/default.jfif";//默认头像
    include("conn.php");
    if(isset($_SESSION["image"])){
        $image=$_SESSION["image"];
    }
    session_destroy();

    if($actName==null)  page_redirect(0,"","活动名称不能为空！");
    if($address==null)  page_redirect(0,"","活动地点不能为空！");
    if($startTime==null)  page_redirect(0,"","活动开始时间不能为空！");
    if($endTime==null)  page_redirect(0,"","活动结束时间不能为空！");
    if($content==null)  page_redirect(0,"","活动内容不能为空！");

    if($startTime>=$endTime) page_redirect(0,"","开始时间大等于结束时间！");
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
