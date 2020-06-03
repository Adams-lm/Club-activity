<?php
//针对某个活动的报名情况，需要get传参
include('conn.php');
$sql="select act_name,account,user_name,service_name,a.user_id,IF(end_time>NOW(),'VIP会员','普通用户')as is_vip from 
( select act_name,`user`.user_id,account,user_name from  activity_join LEFT JOIN `user` ON activity_join.user_id=`user`.user_id LEFT JOIN activity ON activity_join.act_id=activity.act_id WHERE activity_join.`status`=0) as a 
LEFT JOIN service_buy NATURAL JOIN service
ON  a.user_id = service_buy.user_id LEFT JOIN vip_buy on a.user_id=vip_buy.user_id order by is_vip
";
$rs=mysqli_query($conn,$sql);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>