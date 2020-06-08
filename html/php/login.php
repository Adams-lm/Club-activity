<?php
    header("Content-type:text/html;charset=utf-8");
    session_start();
    include("functions.php");
    $account=$_POST["account"];
    $password=$_POST["password"];
    $identity=$_POST["identity"];
    $passPhrase=$_POST["passPhrase"];
    $password=SHA1($password);
    // $password=hash("sha256", $password);
    $userId=0;
    include("conn.php");
    // 验证码校验
    // if($_SESSION['pass_phrase']!=SHA1($passPhrase)){
    //     page_redirect(0,"../pages/login.php","验证码错误！");
    // }
    if($identity=="user"){
        //查询用户id，昵称和密码，前两者存入session
        // showAlert($sql);
        $sql="SELECT user_id,user_name,password,status from user WHERE account=?;";
    }
    else if($identity=="admin"){
        $sql="SELECT admin_id,account,password from admin WHERE account=?;";
    }
    $stmt=mysqli_prepare($conn,$sql); 
    mysqli_stmt_bind_param($stmt,"s",$account);
    mysqli_stmt_execute($stmt);
    $rs=mysqli_stmt_get_result($stmt);

    if(!$row=mysqli_fetch_array($rs)){//若无返回结果
        // showAlert("账号不存在，请审核密码或注册！");
        page_redirect(1,"../pages/login.php","账号不存在，请重新登陆！");
        die();
    }
    else{
        if($row[2]==$password){
            $_SESSION["userId"]=$row[0];
            $_SESSION["userName"]=$row[1];
           
            //用户界面
            if($identity=="user"){ 
                $status=$row[3];
                if($status==1){
                page_redirect(1,"../pages/user.php","登陆成功！");
                }
                else if($status==0){
                page_redirect(1,"../pages/login.php","账号还在申请中！");    
                }
                else{
                page_redirect(1,"../pages/login.php","账号被禁用，请联系管理员!");      
                }
            }
            //管理员界面
            else{
                page_redirect(1,"../pages/admin.php","登陆成功！");
            }
        }
        else{
            page_redirect(0,"../pages/login.php","密码错误！");
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
