<?php
include('conn.php');

//申请中的在上，禁用的在下
$sql="select `user`.user_id,account,user_name,gender,`status`,image,end_time>NOW() as is_vip from user LEFT JOIN vip_buy ON `user`.user_id=vip_buy.user_id where status != 0 ORDER BY `status`DESC,is_vip desc";

$rs=mysqli_query($conn,$sql);
$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>