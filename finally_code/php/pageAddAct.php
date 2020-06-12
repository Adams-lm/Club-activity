<?php 
	if(isset($_POST["index"])){
  		$pageIndex = $_POST["index"];
	}
	if(isset($_POST["size"])){
  		$pageSize = $_POST["size"];
	}

	include "conn.php";
	//防止乱码
	mysqli_query($conn,"set character set 'utf8'");
	mysqli_query($conn,"set names 'utf8'");
	
	// 首次查询，只需要得到记录数量即可
	if($pageIndex==0){
		$query = "select count(*) from activity";
		// 连接数据库
		// 执行查询操作
		$result = $conn->query($query);

		echo json_encode(array("total"=>mysqli_fetch_array($result)['0']));
	}
	else{
		// 设置偏移记录数，即设置开始行号
		$startRowNum = ($pageIndex-1) * $pageSize;  
		$numOfRows = $pageSize;  // 返回的最多行数
		$query = "select *, (NOW()-start_time)/(end_time-start_time)*100 as percent,end_time<NOW() as end,start_time<NOW() as ready from activity order by status desc,end asc,start_time asc limit ".$startRowNum.",". $numOfRows;
		
		$result = $conn->query($query);

		$arr = array();
		while($row = mysqli_fetch_array($result)){
	        array_push($arr, $row);
		}
		echo json_encode($arr);
	}
	
 ?>
