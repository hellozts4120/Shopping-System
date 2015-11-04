<?php
	session_start();
	error_reporting(0);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h1>查询商品信息</h1>
</head>
<body>

<form action = "?action=ask" method = "post">
	<p1>输入编号查询：</p1> <input name = "ProductID" type = "text">
	<input type = "submit" value = "编号查询">
		<br />
	<br />
	<p2>卖家姓名查询：</p2> <input name = "UserID" type = "text">
	<input type = "submit" value = "姓名查询">
</form>

<?php
	if($_GET['action'] == 'ask'){
		$ProductID = $_POST[ProductID];
	}
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$request = mysql_query("SELECT * FROM Product WHERE ProductID = '$ProductID'");
	if(!$request){
		echo "抱歉，未查询到指定编号商品！";
	}
	else{
		$DataOut = mysql_fetch_array($request);
		if(!$DataOut){
			echo "抱歉，未查询到指定编号商品！";
		}
		else{
			echo "指定编号商品信息为：";
			echo "<br />";
			echo $DataOut['ProductID']."".$DataOut['ProductName']."".$DataOut['Price'];
		}
	}
	
	mysql_close($con);
?>

	<br/>
<br/>
<a href = "main.php">返回主界面</a><br/>
</body>
</html>