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
	$AdminName = $_POST[AdminName];
	$AdminPass = $_POST[AdminPass];
	$result = mysql_query("SELECT * FROM Admin WHERE AdminName = '$AdminName' AND AdminPass = '$AdminPass'");

	if ($row = mysql_fetch_array($result)){
		$_SESSION[AdminName] = $row[AdminName];
		$_SESSION[AdminPass] = $row[AdminPass];
		echo "登录成功，您好，".$row[AdminName]."3秒后跳转至管理页面";
		header("Refresh:3;url = manage.php");
	}
	else{
		echo "输入有误！" . "<br/>";
		echo "3秒后跳转回登录界面";
		header("Refresh:3;url = AdminSign.php");
	}

?>

<body/>
<html/>