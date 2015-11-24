<?php
	session_start();
	error_reporting(0);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h1>删除我的订单</h1>
</head>
<body>
<br/>

<?php
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$request = mysql_query("SELECT * FROM PostOut WHERE UserID = '$_SESSION[UserID]'");
	if($request){
		echo "您已发布的商品有：";
		echo "<br />";
		while($row = mysql_fetch_array($request)){
			$TempID = $row['ProductID'];
			$search1 = mysql_query("SELECT * FROM Product WHERE ProductID = '$TempID'");
			$DataOut = mysql_fetch_array($search1);
			echo $DataOut['ProductID']." ".$DataOut['ProductName']." ".$DataOut[Price];
			echo "<br />";
		}
	}
	else{
		echo "您还没有发布商品，不需要删除订单哦！";
	}
	mysql_close($con);
?>

<form action = "isdelete.php" method = "post">
	<p1>输入删除的物品编号：</p1> <input name = "ProductID" type = "text">
	<input type = "submit" value = "删除它！">
		<br />
	<br />
</form>

<a href = "main.php">返回主界面</a><br/>
</body>
</html>