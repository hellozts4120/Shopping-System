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

<form action = "BuyAssure.php" method = "post">
	<p1>输入想要购买的物品编号：</p1> <input name = "ProductID" type = "text">
	<input type = "submit" value = "查询编号">
		<br />
	<br />
</form>

<br/>
<p1>不想买了？<p1/><a href="main.php">点击这里返回主界面！</a><br/>
<body/>
<html/>