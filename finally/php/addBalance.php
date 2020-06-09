<?php
    include("functions.php");
    session_start();
    //避免找不到用户
    if(!isset($_SESSION["userId"])){
        page_redirect(0,null,"充值失败，请重新登入！");
        die();
    }
    $userId=$_SESSION["userId"];
    // $userId=$_POST["userId"];
    $money=$_POST["money"];
    include("conn.php");
    $sql="update user set balance=balance+? where user_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"di",$money,$userId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,null,"充值成功");
    }
    else{
        page_redirect(0,null,"充值失败！！！");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
