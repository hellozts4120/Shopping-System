<?php
	session_start();
	error_reporting(0);
?>

<html>
<head>
<body bgcolor = "pink">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h1>站内管理</h1>
</head>
<body>

<?php
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$request1 = mysql_query("SELECT * FROM Users");
	$request2 = mysql_query("SELECT * FROM Product");
	echo "当前全站用户信息："."<br/>";
	while($UsersInfo = mysql_fetch_array($request1)){
		$re = mysql_query("SELECT * FROM Account WHERE UserID = '$UsersInfo[UserID]'");
		$money = mysql_fetch_array($re);
		echo "用户名：".$UsersInfo[UserID]."<br/>";
		echo "用户密码：".$UsersInfo[Passwords]."<br/>";
		echo "账户余额：".$money[Money]."<br/>";
		echo "<br/>";
	}
	echo "当前全站商品信息："."<br/>";
	while($ProductInfo = mysql_fetch_array($request2)){
		echo "商品ID：".$ProductInfo[ProductID]."<br/>";
		echo "商品名称：".$ProductInfo[ProductName]."    价格：".$ProductInfo[Price]."<br/>";
		echo "所有人：".$ProductInfo[OwnerID]."<br/>";
		echo "<br/>";
	}
?>	

<form action = "?action=ask" method = "post">
	<p1>删除违规商品</p1> <input name = "ProductID" type = "text">
	<input type = "submit" value = "输入商品编号">
		<br />
	<br />
	<p2>封禁违规用户</p2> <input name = "UserID" type = "text">
	<input type = "submit" value = "输入用户 I D">
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
	if(!empty($_POST[ProductID]) && empty($_POST[UserID])){
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
				mysql_query("DELETE FROM Product WHERE ProductID = '$ProductID'");
				echo "删除成功！";
				header("Refresh:2;url = manage.php");
			}
		}
	}
	else if(!empty($_POST[UserID]) && empty($_POST[ProductID])){
		$request = mysql_query("SELECT * FROM Users WHERE UserID = '$UserID'");
		if(!$request){
			echo "抱歉，未查询到指定卖家！";
		}
		else{
			$DataOut = mysql_fetch_array($request);
			if(!DataOut){
				echo "抱歉，未查询到指定卖家！";
			}
			else{
				mysql_query("DELETE FROM Product WHERE OwnerID = '$UserID'");
				mysql_query("DELETE FROM Account WHERE UserID = '$UserID'");
				mysql_query("DELETE FROM Users WHERE UserID = '$UserID'");
				echo "删除成功！";
				header("Refresh:2;url = manage.php");
			}
		}
	}
	else{
		echo "输入有误！请重新输入！";
	}
?>

<a href="logout.php">注销</a>
<body/>
<html/>