<?php
	header("Content-type:text/html;charset=utf-8");

	//一、获取用户的输入
	$vivoid = $_POST['vivoid'];
	$vivopass = $_POST['vivopass'];

	//二、处理

	//1、建立连接（搭桥）
	$conn = mysql_connect('localhost','root','root');
	if(!$conn){
		die("连接失败");
	}
	//2、选择数据库（选择目的地）
	mysql_select_db("subingquan",$conn);

	//3、执行SQL语句（传输数据）
	//3.1 查询
	if($vivopass==""){
		$sqlstr="insert into vivo values('$vivoid','$vivopass')";
	}else{
		$sqlstr="update vivo set pass='$vivopass' where id='$vivoid'";
	}
	
	

	$result = mysql_query($sqlstr,$conn);

	//4、关闭数据库（过河拆桥）
	mysql_close($conn);

	//三、响应
	if($result>0){
		echo "1";	
	}else{
		echo "0";	
	}

?>
