<?php
    include("functions.php");
    $id=$_GET["id"];
    $status=1;
    include("conn.php");
    $sql="update activity_join set status=? where id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ii",$status,$id);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"","审批通过!");
    }
    else{
        page_redirect(1,"","审批失败!");   
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>