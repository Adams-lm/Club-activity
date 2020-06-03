<?php
    include("conn.php");
    include("functions.php");
    $userId=$_POST["userId"];
    // session_start();
    // $userId=$_SESSION["userId"];
    $password=$_POST["password"];
    $userName=$_POST["userName"];
    $gender=$_POST["gender"];
    $image=$_POST["image"];
    $password=hash("sha256", $password);
    
    $sql="update user set password=?,user_name=?,gender=?,image=? where user_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ssssi",$password,$userName,$gender,$image,$userId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","用户信息修改成功!");
    }
    else{
        page_redirect(1,"","用户信息修改失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>