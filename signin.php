<html>
<body>
<body bgcolor = "green">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h1>新用户注册<h1/>

<form action = "?action=ask" method = "post">
	<p1>输入用户名<p1/> <input name = "UserID" type = "text">
		<br/>
	<p2>输入密码<p2/> <input name = "Passwords" type = "password">
		<br/>
	<p3>确认密码<p3/> <input name = "RePasswords" type = "password">
		<br/>
	<p4>输入性别<p4/> <input name = "SEX" type = "text">
		<br/>
	<p5>输入年龄<p5/> <input name = "AGE" type = "text">
		<br/>
	<input type = "submit" value = "提交信息">
	<br/>
<br/>	
</form>

<?php
	session_start();
	error_reporting(0);
	if($_GET['action'] == 'ask'){
		$UserID = $_POST[UserID];
		$Passwords = $_POST[Passwords];
		$RePasswords = $_POST[RePasswords];
		$SEX = $_POST[SEX];
		$AGE = $_POST[AGE];
	}
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	if(!empty($_POST[UserID]) && !empty($_POST[Passwords]) && !empty($_POST[RePasswords]) && !empty($_POST[SEX]) && !empty($_POST[AGE])){
		$request = mysql_query("SELECT * FROM Users WHERE UserID = '$UserID'");
		if($request){
			if(mysql_fetch_array($request)){
				echo "用户名已被占用！请重新输入用户名！";
			}
			else if($Passwords != $RePasswords){
				echo "两次输入的密码应相同！";
			}
			else{
				$request1 = mysql_query("INSERT INTO Users(UserID,Passwords,SEX,AGE) VALUES ('$UserID','$Passwords','$SEX','$AGE')");
				$request2 = mysql_query("INSERT INTO Account(UserID,Money) VALUES ('$UserID',100)");
				echo "本网站开业大酬宾！新注册用户均可免费赠送100元供购物！"."<br/>";
				echo $UserID.",您已注册成功，马上跳转至登录页面啦~";
				header("Refresh:3;url = index.php");
			}
		}
		else{
			echo "输出有错！请重新输入";
			header("Refresh:1;url = signin.php");
		}
	}
	else{
		echo "关键信息输入不能为空！";

	}
	mysql_close($con);
?>
<br/>
<a href="index.php">返回</a><br/>		
		
<body/>
<html/>		