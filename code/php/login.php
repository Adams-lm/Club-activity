<?php
    session_start();
    include("functions.php");
    $account=$_POST["account"];
    $password=$_POST["password"];
    $identity=$_POST["identity"];
    $password=hash("sha256", $password);
    $userId=0;
    include("conn.php");
    if($identity=="user"){
        //查询用户id，昵称和密码，前两者存入session
        $sql="SELECT user_id,user_name,password,status from user WHERE account=?;";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"s",$account);
        mysqli_stmt_execute($stmt);
        $rs=mysqli_stmt_get_result($stmt);
    }
    else if($identity=="admin"){
        $sql="SELECT admin_id,account,password from admin WHERE account=?;";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"s",$account);
        mysqli_stmt_execute($stmt);
        $rs=mysqli_stmt_get_result($stmt);
    }
    if(!$row=mysqli_fetch_array($rs)){//若无返回结果
        page_redirect(0,"","用户名不存在！");
        die();
    }
    else{
        if($row[2]==$password){
            $_SESSION["userid"]=$row[0];
            $_SESSION["username"]=$row[1];
            $status=$row[3];
            //用户界面
            if($identity=="user"){
                if($status==1){
                page_redirect(1,"","登陆成功！");
                }
                else if($status==0){
                page_redirect(1,"","账号还在申请中！");    
                }
                else{
                page_redirect(1,"","账号被禁用！请联系管理员!");      
                }
            }
            //管理员界面
            else{
                page_redirect(1,"","登陆成功！");
            }
        }
        else{
            die("密码错误");
            page_redirect(0,"","密码错误！");
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
