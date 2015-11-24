<html>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
	session_start();
	error_reporting(0);
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$ProductID = $_POST[ProductID];
	$result = mysql_query("SELECT * FROM PostOut WHERE ProductID = '$ProductID' AND UserID = '$_SESSION[UserID]'");
	if(mysql_fetch_array($result)){
		mysql_query("DELETE FROM PostOut WHERE ProductID = '$ProductID'");
		mysql_query("DELETE FROM Product WHERE ProductID = '$ProductID'");
		echo $_SESSION[UserID].",您的订单已成功删除！2秒后自动返回至上层！";
		header("Refresh:2;url = postout.php");
	}
	else{
		echo "抱歉，".$_SESSION[UserID].",无法在您的商品中找到指定编号的商品信息！2秒后自动返回至上层！";
		header("Refresh:2;url = postout.php");
	}
?>

<a href = "deletestuff.php">返回上层界面</a><br/>
<body/>
<html/>