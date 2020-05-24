<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>modify</title>
    <link rel="stylesheet" type="text/css" href="../assets/style2.css">
</head>
<body>
<?php
    include("functions.php");
    include("conn.php");
    $id=$_GET["id"];
    $sql="select id,user_name,user_pwd,user_image from users where id=?";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
    $rs=mysqli_stmt_get_result($stmt);
    $row=mysqli_fetch_array($rs);
?> 
    <table>
    <tr>
        <td class='tittle'>头像</td>
        <td class='tittle'>用户名</td>
        <td class='tittle'>密码</td>
        <td colspan='2' class='tittle'>操作</td>
    </tr>
    <tr>
        <form action="modify_db.php" method="post">
        <input hidden type="text" name="id" value="<?php echo"$id"?>"/>
        <td style='border-bottom:none'>
            <img src="<?php echo"$row[3]"?> " width="50" height="50" alt="">
        </td>
        <td><input type="text" name="name" value="<?php echo"$row[1]"?>"/></td>
        <td><input type="text" name="password" value="<?php echo"$row[2]"?>"/></td>
        <td><input type="submit" value="保存" /></td>
        </form>
    </tr>
</body>
</html>
