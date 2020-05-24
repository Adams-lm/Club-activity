<?php
    include("functions.php");
    $account=$_POST["account"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $password=hash("sha256", $password);
    include("conn.php");
    
    // 遍历表判断用户名是否重复
    $sql2="SELECT account from user;";
    $rs=mysqli_query($conn,$sql2);
    while($row=mysqli_fetch_array($rs)){
        if($row[0]==$account){
            page_redirect(1,"11","用户名重复！");
            die();
        }
    }
    $sql="INSERT INTO user (account,user_name,password) VALUES (?,?,?);";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"sss",$account,$username,$password);
    mysqli_stmt_execute($stmt);
    if(mysqli_affected_rows($conn)>0){
        page_redirect(1,"","注册成功！");
    }
    else{
        page_redirect(1,"","注册失败！");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
