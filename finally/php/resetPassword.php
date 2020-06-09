<?php
    include("functions.php");
    $userId=$_GET["userId"];
    $password="Ab123456";
    // $password=hash("sha256", $password);
    $password=SHA1($password);
    include("conn.php");
    $sql="update user set password=? where user_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"si",$password,$userId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","重置密码成功!");
    }
    else{
        page_redirect(0,"","重置密码成功！");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>