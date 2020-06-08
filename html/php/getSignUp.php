<?php
include('conn.php');
$actId=$_POST['actId'];
$sql="select act_name,user_name,IFNULL(service_name,'无') as service_name,if(is_sign=1,'已签到','未签到') as is_sign
from activity_join a LEFT JOIN `user` u ON a.user_id=u.user_id LEFT JOIN service_buy s ON a.user_id=s.user_id 
LEFT JOIN activity aa ON a.act_id = aa.act_id LEFT JOIN service ON s.service_id=service.service_id
WHERE a.act_id = ? AND s.service_id in(SELECT service_id from service WHERE act_id =?) 
ORDER BY a.is_sign desc";

$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"ii",$actId,$actId);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>
