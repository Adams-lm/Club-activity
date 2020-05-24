<?php
    session_start();
    include("functions.php");
    $name=$_POST["name"];
    $passwd=$_POST["password"];
    $image="../upload/default.jfif";//默认头像
    include("conn.php");
    if(isset($_SESSION["userimage"])){
        $image=$_SESSION["userimage"];
    }
    // }else{
    //     $sql="select user_image from students where user_name=$name and user_pwd=$passwd";
    //     $rs=mysqli_query($conn,$sql);
    //     if(mysqli_affected_rows($conn)>0){
    //         $row=mysqli_fetch_array($rs);
    //         $image=$row[0];
    //     }
    // }
    include("conn.php");
    $sql="insert into users values(NULL,?,?,?,0,1)";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"sss",$name,$passwd,$image);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"../index.php","插入成功！");
    }
    else{
        page_redirect(1,"../index.php","没有变化！");   
    }
?>;