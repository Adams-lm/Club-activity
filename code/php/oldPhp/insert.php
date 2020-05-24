<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>insert</title>
    <link rel="stylesheet" type="text/css" href="../assets/style2.css">
</head>
<body>
    <table style="display:right">
    <tr>
        <td class='tittle'>用户名</td>
        <td class='tittle'>密码</td>
        <td colspan='2' class='tittle'>操作</td>
    </tr>
    <tr>
        <form action="insert_db.php" method="post">
        <td><input type="text" name="name" placeholder="用户名"/></td>
        <td><input type="text" name="password" placeholder="密码"/></td>
        <td><input type="submit" value="保存" /></td>
    </tr>
    </table>
    <label>
            <img src="../upload/default.jfif" width="100px" height="100px" id="userImage">
            <iframe src="upload.php" height="100px"></iframe>
    </label>
    </form>
</body>
</html>
