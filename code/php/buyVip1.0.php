<?php
    //部分语句还未使用防注入！
    include("functions.php");
    $userId=$_GET["userId"];
    $type=$_GET["type"];
    include("conn.php");
    //判断用户余额是否充足
    $sql1="SELECT (SELECT price from vip where type =$type)<=balance FROM user where user_id=$userId;";
    $rs1=mysqli_query($conn,$sql1);
    if($row1=mysqli_fetch_array($rs1)){
        $is_enough=$row1[0];
        //若余额不足
        if(!$is_enough){
            page_redirect(1,NULL,"余额不足，请充值！"); 
        }
        else{
            $sql="update user set balance=balance-(SELECT price from vip where type = ?) where user_id = ?";
            $stmt=mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt,"ii",$type,$userId);
            mysqli_stmt_execute($stmt);
        }
    }
    // 遍历表判断用户是否充值过会员
    $sql2="SELECT end_time from vip_buy where user_id=$userId;";
    $rs2=mysqli_query($conn,$sql2);
    if($row2=mysqli_fetch_array($rs2)){
        $endTime=$row2[0];
        //判断会员是否过期
        $sql3="SELECT end_time<NOW() from vip_buy WHERE user_id=$userId;";
        $rs3=mysqli_query($conn,$sql3);
        if($row3=mysqli_fetch_array($rs3)){
            $is_past=$row3[0];
            //如果过期
            if($is_past){
                $sql="update vip_buy set start_time = NOW(),end_time=DATE_ADD(start_time,INTERVAL ? MONTH) where user_id=?;";
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_stmt_bind_param($stmt,"ii",$type,$userId);
                mysqli_stmt_execute($stmt);
                if(mysqli_affected_rows($conn)>0){
                    page_redirect(1,NULL,"成功开通"."$type"."个月");
                }
                else{
                    page_redirect(1,NULL,"失败！！！");
                }
            }
            //没有过期
            else{
                $sql="update vip_buy set end_time=DATE_ADD(end_time,INTERVAL ? MONTH) where user_id=?;";
                $stmt=mysqli_prepare($conn,$sql);
                mysqli_stmt_bind_param($stmt,"ii",$type,$userId);
                mysqli_stmt_execute($stmt);
                if(mysqli_affected_rows($conn)>0){
                    page_redirect(1,NULL,"成功续费"."$type"."个月");
                }
                else{
                    page_redirect(1,NULL,"续费失败！！！");
                }
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
            page_redirect(1,NULL,"成功注册"."$type"."个月VIP会员!!");
        }
        else{
            page_redirect(1,NULL,"注册VIP会员失败！！！");
        }
    }
    mysqli_close($conn);
?>