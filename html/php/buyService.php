<?php
    header("Content-type:text/html;charset=utf-8");
    include("functions.php");
    session_start();
    $userId=$_SESSION["userId"];
    // $userId=$_GET["userId"];
    if(!isset($_GET["serviceId"])){
        page_redirect(0,NULL,"暂无服务包。");
    }
    $serviceId=$_GET["serviceId"];
    include("conn.php");
    $sql="SELECT id FROM service_buy WHERE user_id=?;";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$userId);
    mysqli_stmt_execute($stmt);
    $rs=mysqli_stmt_get_result($stmt);
    //若已订购过服务包
    if($row=mysqli_fetch_array($rs)){
        page_redirect(0,NULL,"您已购买过该服务包！！！"); 
        die();
    }

    //判断用户余额是否充足
    $sql1="SELECT (SELECT price from service where service_id = ?) <= balance FROM user where user_id = ?;";
    $stmt1=mysqli_prepare($conn,$sql1);
    mysqli_stmt_bind_param($stmt1,"ii",$serviceId,$userId);
    mysqli_stmt_execute($stmt1);
    $rs1=mysqli_stmt_get_result($stmt1);
    $row1=mysqli_fetch_array($rs1);
    $is_enough=$row1[0];
    //若余额不足
    if(!$is_enough){
        page_redirect(1,NULL,"余额不足，请充值！"); 
        die();
    }
    // 遍历表判断用户是否充值过会员
    $sql2="SELECT end_time from vip_buy where user_id = ?;";
    $stmt2=mysqli_prepare($conn,$sql2);
    mysqli_stmt_bind_param($stmt2,"i",$userId);
    mysqli_stmt_execute($stmt2);
    $rs2=mysqli_stmt_get_result($stmt2);
    $row2=mysqli_fetch_array($rs2);
    $endTime=$row2[0];
    //判断会员是否过期
    $sql3="SELECT end_time >= NOW() from vip_buy WHERE user_id = ?;";
    $stmt3=mysqli_prepare($conn,$sql3);
    mysqli_stmt_bind_param($stmt3,"i",$userId);
    mysqli_stmt_execute($stmt3);
    $rs3=mysqli_stmt_get_result($stmt3);
    //如果开通过会员
    if($row3=mysqli_fetch_array($rs3)){
        $is_vip=$row3[0];
        //如果没有过期
        if($is_vip){
            //免费购买
            $sql="INSERT INTO service_buy (user_id,service_id) VALUES(?,?);";
            $stmt=mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt,"ii",$userId,$serviceId);
            mysqli_stmt_execute($stmt);
            if(mysqli_affected_rows($conn)>0){
                page_redirect(1,NULL,"您是尊贵的VIP会员，免费享用本次服务包！");
            }
            else{
                page_redirect(1,NULL,"购买服务包失败！");
            }
        }
    }
    else{
        //如果会员过期或不是会员
        //先扣费
        $sql="update user set balance = balance - (SELECT price from service where service_id = ?) where user_id = ?";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"ii",$serviceId,$userId);
        mysqli_stmt_execute($stmt);
        
        //插入购买表
        $sql2="INSERT INTO service_buy (user_id,service_id) VALUES(?,?);";
            $stmt2=mysqli_prepare($conn,$sql2);
            mysqli_stmt_bind_param($stmt2,"ii",$userId,$serviceId);
            mysqli_stmt_execute($stmt2);
            if(mysqli_affected_rows($conn)>0){
                page_redirect(1,NULL,"购买服务包成功！");
            }
            else{
                page_redirect(1,NULL,"购买服务包失败！");
            }
        if(mysqli_affected_rows($conn) <= 0){
            page_redirect(1,NULL,"购买失败！");
            die();
        }
    }
    mysqli_close($conn);
?>