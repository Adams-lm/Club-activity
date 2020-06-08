<?php
header("Content-type:text/html;charset=utf-8");
include("functions.php");
include("conn.php");
$sql="SELECT price FROM vip WHERE type!=6 order by type desc";
$stmt=mysqli_prepare($conn,$sql);
mysqli_stmt_execute($stmt);
$rs=mysqli_stmt_get_result($stmt);

while($row=mysqli_fetch_array($rs)){
  echo $row[0]." ";
}
?>