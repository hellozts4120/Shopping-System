<?php
	session_start();
	error_reporting(0);
?>

<html>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$curMoney = $_POST[curMoney];
	$Passwords = $_POST[Passwords];
	$request = mysql_query("SELECT * FROM Account WHERE UserID = '$_SESSION[UserID]'");
	$data = mysql_fetch_array($request);
	if($Passwords != $_SESSION[Passwords]){
		echo "输入密码有误！充值失败！即将返回上层！"."<br/>";
		header("Refresh:3;url = account.php");
	}
	else{
		$NewMoney = $data[Money] + $curMoney;
		echo "充值成功！本次共充值 "."$curMoney"." 元，当前账户余额 ".$NewMoney." 元。"."<br/>";
		echo "<br/>";
		mysql_query("UPDATE Account SET Money = Money + $curMoney WHERE UserID = '$_SESSION[UserID]'");
	}
	header("Refresh:3;url = account.php");
	mysql_close($con);
?>

<br/>	
<br/>
<a href = "account.php">返回上层界面</a><br/>
<body/>
<html/>