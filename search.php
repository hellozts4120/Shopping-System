<?php
	session_start();
	error_reporting(0);
?>

<html>
<head>
<body bgcolor = "red">
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
		$UserID = $_POST[UserID];
	}
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	if((!empty($_POST[ProductID])) && empty($_POST[UserID])){
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
				echo $DataOut['ProductID']." ".$DataOut['ProductName']." ".$DataOut['Price'];
			}
		}
	}
	else if((!empty($_POST[UserID])) && empty($_POST[ProductID])){
		$request = mysql_query("SELECT * FROM PostOut WHERE UserID = '$UserID'");
		if(!$request){
			echo "抱歉，未查询到指定卖家！";
		}
		else{
			$isout = false;
			echo "指定卖家的所有商品信息为：";
			echo "<br />";
			while($DataOut = mysql_fetch_array($request)){
				$quest = mysql_query("SELECT * FROM Product WHERE ProductID = '$DataOut[ProductID]'");
				$DataOutReal = mysql_fetch_array($quest);
				echo $DataOutReal['ProductID']." ".$DataOutReal['ProductName']." ".$DataOutReal['Price'];
				echo "<br />";
				$isout = true;
			}
			if(!$isout){
				echo "抱歉，未查询到指定卖家发布的信息！";
			}
		}
	}
	else{
		echo "输入有误！请重新输入！";
	}
	mysql_close($con);
?>

	<br/>
<br/>
<a href = "main.php">返回主界面</a><br/>
</body>
</html>