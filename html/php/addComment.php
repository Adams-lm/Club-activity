<?php
    header("Content-type:text/html;charset=utf-8");
    include("functions.php");
    session_start();
    $userId=$_SESSION["userId"];
    // $userId=$_GET["userId"];
    $actId=$_POST["actId"];
    $content=$_POST["content"];
    include("conn.php");
    $sql="INSERT INTO evaluate (user_id,act_id,content,time) VALUES (?,?,?,NOW());";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"iis",$userId,$actId,$content);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(0,"getCommentList.php","评论成功");
    }
    else{
        page_redirect(0,"","评论失败！！！");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
