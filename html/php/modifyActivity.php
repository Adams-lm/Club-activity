<?php
    session_start();
    include("functions.php");
    $image="../../../upload/default.jfif";//默认头像
    include("conn.php");

    $actId=$_POST["actId"];
    $actName=$_POST["actName"];
    $content=$_POST["content"];
    $startTime=$_POST["startTime"];
    $endTime=$_POST["endTime"];
    $status=$_POST["status"];
    $signUp=$_POST["signUp"];
    $address=$_POST["address"];


    if($actName==null)  page_redirect(0,"","活动名称不能为空！");
    if($address==null)  page_redirect(0,"","活动地点不能为空！");
    if($startTime==null)  page_redirect(0,"","活动开始时间不能为空！");
    if($endTime==null)  page_redirect(0,"","活动结束时间不能为空！");
    if($content==null)  page_redirect(0,"","活动内容不能为空！");

    if($startTime>=$endTime) page_redirect(0,"","开始时间大等于结束时间！");


    //若有更改图片    
    if(isset($_SESSION["image"])){
        $image=$_SESSION["image"];
        session_destroy();
        $sql="update activity set act_name=?,content=?,start_time='$startTime',end_time='$endTime',status=?,sign_up=?,image=?,address='$address' where act_id=?";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"ssiisi",$actName,$content,$status,$signUp,$image,$actId);
        mysqli_stmt_execute($stmt);
        if(mysqli_affected_rows($conn)>0){
            page_redirect(1,"../pages/admin/activityManagement/manageActInfo.php","活动信息修改成功!");
        }
        else{
            page_redirect(0,"","活动信息修改失败!");   
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    //无更改图片，不对image进行更新
    else{
        $sql="update activity set act_name=?,content=?,start_time='$startTime',end_time='$endTime',status=?,sign_up=?,address='$address' where act_id=?";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"ssiii",$actName,$content,$status,$signUp,$actId);
        mysqli_stmt_execute($stmt);
        if(mysqli_affected_rows($conn)>0){
            page_redirect(1,"../pages/admin/activityManagement/manageActInfo.php","活动信息修改成功!");
        }
        else{
            page_redirect(0,"","没有任何修改!");   
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);        
    }


?>