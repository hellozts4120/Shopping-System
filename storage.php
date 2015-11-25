<?php
	session_start();
	error_reporting(0);
	
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h1>我的商品信息</h1>
</head>
<body>
<br/>

<p1>我的用户名：</p1>
	<?php	echo $_SESSION[UserID]
	?>
	<br/>
<p2>我的性别：</p2>
	<?php	
		if($_SESSION[SEX] = 'M'){
			echo "男";
		}
		else{
			echo "女";
		};
	?>
	<br/>
<p3>我的年龄：</p3>
	<?php	echo $_SESSION[AGE];
	?>
	<br/>

<?php
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$request = mysql_query("SELECT * FROM Product WHERE OwnerID = '$_SESSION[UserID]'");
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
		echo "您还没有发布商品，快去添加商品吧！";
	}
	mysql_close($con);
?>
	<br/>
<br/>	
<a href = "main.php">返回主界面</a><br/>
</body>
</html>