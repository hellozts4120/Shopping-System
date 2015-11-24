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
	$ProductName = $_POST[ProductName];
	$Price = $_POST[Price];
	if($ProductID!="" && $ProductName!="" && $Price!=""){
		$request = mysql_query("SELECT * FROM Product WHERE ProductID = '$ProductID'");
		if(mysql_fetch_array($request)){
			echo "商品编号已存在！";
			echo "即将自动返回至上传界面！";
			header("Refresh:3;url = postout.php");
		}
		else{
			$request = mysql_query("INSERT INTO Product(ProductID,ProductName,Price) VALUES ('$ProductID','$ProductName','$Price')");
			$request1 = mysql_query("INSERT INTO PostOut(UserID,ProductID) VALUES ('$_SESSION[UserID]','$ProductID')");
			echo $_SESSION[UserID].",您的商品已经上传完成！";
			echo "即将自动返回至上传界面！";
			header("Refresh:3;url = postout.php");
		}
	}
	else{
		echo "输入信息不全！";
		echo "即将自动返回至上传界面！";
		header("Refresh:3;url = postout.php");
	}
	mysql_close($con);
	
?>
	
<body/>
<html/>