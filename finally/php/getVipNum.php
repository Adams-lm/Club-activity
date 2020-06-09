
<?php
include("conn.php");
$status=1;

$sql="SELECT if(is_vip=1,'VIP会员','普通用户')AS name,COUNT(*) as value
FROM
(SELECT IFNULL(end_time>NOW(),0) as is_vip from	`user` u LEFT JOIN vip_buy v on u.user_id=v.user_id
where status=? )as a
GROUP BY is_vip";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_bind_param($stmt,"i",$status);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);

$arrs=[];
while($row=mysqli_fetch_assoc($rs)){
    array_push($arrs,$row);
}
echo json_encode($arrs);
?>
