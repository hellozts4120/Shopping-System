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
	$result = mysql_query("SELECT * FROM Product WHERE ProductID = '$ProductID' AND OwnerID = '$_SESSION[UserID]'");
	if(mysql_fetch_array($result)){
		mysql_query("DELETE FROM Product WHERE ProductID = '$ProductID'");
		mysql_query("DELETE FROM Product WHERE ProductID = '$ProductID'");
		echo $_SESSION[UserID].",您的商品已成功删除！2秒后自动返回至上层！";
		header("Refresh:2;url = deletestuff.php");
	}
	else{
		echo "抱歉，".$_SESSION[UserID].",无法在您的商品中找到指定编号的商品信息！2秒后自动返回至上层！";
		header("Refresh:2;url = deletestuff.php");
	}
?>

<a href = "deletestuff.php">返回上层界面</a><br/>
<body/>
<html/>