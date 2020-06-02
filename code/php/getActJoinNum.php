
<?php
include("conn.php");
$status=1;

$sql="SELECT act_name AS name,count(*) AS value FROM activity_join a
LEFT JOIN activity b ON a.act_id=b.act_id  WHERE a.`status`=? GROUP BY a.act_id ;";
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