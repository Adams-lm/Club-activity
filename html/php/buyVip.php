<?php
    include("functions.php");
    session_start();
    $userId=$_SESSION["userId"];
    // $userId=$_GET["userId"];
    $type=$_GET["type"];
    include("conn.php");
    //判断用户余额是否充足
    $sql1="SELECT * FROM user where user_id=? and balance >= (SELECT price from vip where type=?)";
    $stmt1=mysqli_prepare($conn,$sql1);
    mysqli_stmt_bind_param($stmt1,"ii",$userId,$type);
    mysqli_stmt_execute($stmt1);
    $rs1=mysqli_stmt_get_result($stmt1);
    $row1=mysqli_fetch_array($rs1);
    // $is_enough=$row1[0];
    //若余额不足
    if(!$row1){
        page_redirect(0,NULL,"余额不足，请充值！"); 
        die();
    }
    //余额充值，先将余额减少相应金额
    else{
        $sql="update user set balance = balance - (SELECT price from vip where type = ?) where user_id = ?";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"ii",$type,$userId);
        mysqli_stmt_execute($stmt);
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
    $sql3="SELECT end_time < NOW() from vip_buy WHERE user_id = ?;";
    $stmt3=mysqli_prepare($conn,$sql3);
    mysqli_stmt_bind_param($stmt3,"i",$userId);
    mysqli_stmt_execute($stmt3);
    $rs3=mysqli_stmt_get_result($stmt3);
    if($row3=mysqli_fetch_array($rs3)){
        $is_past=$row3[0];
        //如果过期
        if($is_past){
            //开始时间和结束时间都要更新
            $sql="update vip_buy set start_time = NOW(),end_time=DATE_ADD(start_time,INTERVAL ? MONTH) where user_id=?;";
            $stmt=mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt,"ii",$type,$userId);
            mysqli_stmt_execute($stmt);
            if(mysqli_affected_rows($conn)>0){
                page_redirect(0,NULL,"成功开通"."$type"."个月VIP会员！");
            }
            else{
                page_redirect(0,NULL,"开通会员失败！！！");
            }
        }
        //没有过期
        else{
            //只需更新结束时间
            $sql="update vip_buy set end_time=DATE_ADD(end_time,INTERVAL ? MONTH) where user_id=?;";
            $stmt=mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt,"ii",$type,$userId);
            mysqli_stmt_execute($stmt);
            if(mysqli_affected_rows($conn)>0){
                page_redirect(0,NULL,"成功续费"."$type"."个月VIP会员!");
            }
            else{
                page_redirect(0,NULL,"续费会员失败！！！");
            }
        }
    }
    else{
        //若未充值过会员
        $sql="INSERT INTO vip_buy (user_id,start_time,end_time) VALUES(?,NOW(),DATE_ADD(now(),INTERVAL ? MONTH) );";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"ii",$userId,$type);
        mysqli_stmt_execute($stmt);
        if(mysqli_affected_rows($conn)>0){
            page_redirect(0,NULL,"成功首次开通"."$type"."个月VIP会员!");
        }
        else{
            page_redirect(0,NULL,"开通会员失败！！！");
        }
    }
    mysqli_close($conn);
?>