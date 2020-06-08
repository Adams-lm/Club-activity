<?php
    header("Content-type:text/html;charset=utf-8");
    include("conn.php");
    include("functions.php");
    // $userId=$_POST["userId"];
    session_start();
    $userId=$_SESSION["userId"];
    $password=$_POST["password"];
    $userName=$_POST["username"];
    $gender=$_POST["gender"];
    $image=$_SESSION["image"];
    //密码不变，不修改
    if($password=="1234Aa"){
        $sql="update user set user_name=?,gender=?,image=? where user_id=?";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"sssi",$userName,$gender,$image,$userId);
    }else{
        $password=SHA1($password);
        $sql="update user set password=?,user_name=?,gender=?,image=? where user_id=?";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"ssssi",$password,$userName,$gender,$image,$userId);
    }
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"","用户信息修改成功!");
    }
    else{
        page_redirect(0,"","用户信息修改失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>