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
	$UserID = $_POST[UserID];
	$Passwords = $_POST[Passwords];
	$result = mysql_query("SELECT * FROM Users WHERE UserID = '$UserID' AND Passwords = '$Passwords'");

	if ($row = mysql_fetch_array($result)){
		$_SESSION[UserID] = $row[UserID];
		$_SESSION[Passwords] = $row[Passwords];
		$_SESSION[SEX] = $row[SEX];
		$_SESSION[AGE] = $row[AGE];
		echo "登录成功！3秒后跳转至个人页面";
		header("Refresh:3;url = main.php");
	}
	else{
		echo "输入有误！" . "<br/>";
		echo "3秒后跳转回登录界面";
		header("Refresh:3;url = index.php");
	}

?>

<body/>
<html/>