<?php
    include("functions.php");
    $id=$_GET["id"];
    $del=1;
    include("conn.php");
    $sql="update users set is_del=? where id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ii",$del,$id);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"../index.php","删除成功！");
    }
    else{
        page_redirect(1,"../index.php","删除失败！");   
    }
?>