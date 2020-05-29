<?php
    include("conn.php");
    include("functions.php");
    $userId=$_POST["userId"];
    // session_start();
    // $userId=$_SESSION["userId"];
    $password=$_POST["password"];
    $adminName=$_POST["adminName"];
    $gender=$_POST["gender"];
    $imahe=$_POST["image"];
    $password=hash("sha256", $password);
    
    $sql="update admin set password=?,admin_name=?,gender=?,image=? where admin_id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ssssi",$password,$adminName,$gender,$image,$userId);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"","管理员信息修改成功!");
    }
    else{
        page_redirect(1,"","管理员信息修改失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>