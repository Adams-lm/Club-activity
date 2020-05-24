<?php
    include("functions.php");
    $userId=$_GET["userId"];
    $password=123;
    $password=hash("sha256", $password);
    include("conn.php");
    $sql="update user set password=? where user_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"si",$password,$userId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"","重置密码成功!");
    }
    else{
        page_redirect(1,"","重置密码失败！！!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>