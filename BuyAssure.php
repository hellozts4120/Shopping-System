<?php
	session_start();
	error_reporting(0); 
?>

<html>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php

	$con = mysql_connect("localhost","root","zts1996412");
	if(!con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$ProductID = $_POST[ProductID];
	$result = mysql_query("SELECT * FROM Product WHERE ProductID = '$ProductID'");
	
	if($row = mysql_fetch_array($result)){
		$search1 = mysql_query("SELECT * FROM Product WHERE ProductID = '$ProductID'");
		$search2 = mysql_query("SELECT * FROM Account WHERE UserID = '$_SESSION[UserID]'");
		$YourMoney = mysql_fetch_array($search2);
		$DataOut = mysql_fetch_array($search1);
		$SellerID = $row[OwnerID];
		if($SellerID == $_SESSION[UserID]){
			echo "不能购买自己的商品！2秒后返回上层！";
			header("Refresh:2;url = buy.php");
		}
		else if($DataOut['Price'] > $YourMoney[Money]){
			echo "您的余额不足！2秒后返回上层";
			header("Refresh:2;url = buy.php");
		}
		else{
			echo $_SESSION[UserID]."，已成功购买！请您确认订单信息："."<br/>";
			echo "出售者：".$SellerID."<br/>";
			echo "购买者：".$_SESSION[UserID]."<br/>";
			echo "商品编号：".$ProductID."<br/>";
			echo "商品名称：".$DataOut['ProductName']."<br/>";
			echo "商品价格：".$DataOut['Price']."<br/>";
			echo "<br/>";
			echo "商品已归于您名下！"."<br/>";
			mysql_query("UPDATE Account SET Money = Money - '$DataOut[Price]' WHERE UserID = '$_SESSION[UserID]'");
			mysql_query("UPDATE Account SET Money = Money + '$DataOut[Price]' WHERE UserID = '$SellerID'");
			mysql_query("UPDATE Product SET OwnerID = '$_SESSION[UserID]' WHERE ProductID = '$ProductID'");
			mysql_query("DELETE FROM ShouCang WHERE UserID = '$_SESSION[UserID]' AND ProductID = '$ProductID'");
		}
	}
	else{
		echo "输入有误！" . "<br/>";
		echo "3秒后跳转回上层页面";
		header("Refresh:3;url = buy.php");
	}
?>

<br/>
<br/>	
<a href = "buy.php">返回上层界面</a><br/>
</body>
</html>