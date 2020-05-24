<?php
    include("functions.php");
    $id=$_POST["id"];
    $name=$_POST["name"];
    $passwd=$_POST["password"];
    include("conn.php");
    $sql="update users set user_name=?,user_pwd=?  where id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ssi",$name,$passwd,$id);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"../index.php","修改成功！");
    }
    else{
        page_redirect(1,"../index.php","没有变化！");   
    }
?>