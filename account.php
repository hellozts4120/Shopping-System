<?php
	session_start();
	error_reporting(0);
?>

<html>
<head>
<body bgcolor = "red">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<h1>我的账户</h1>
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
	$request = mysql_query("SELECT * FROM Account WHERE UserID = '$_SESSION[UserID]'");
	if($request){
		$curMoney = mysql_fetch_array($request);
		echo "账户余额：";
		echo $curMoney[Money]."<br/>";
	}
	else{
		echo "账户出错！"."<br/>";
	}
	mysql_close($con);
?>
<br/>

<form name = "账户充值" action = "MoneyIn.php" method = "post">
	<div class="int">
	<label for="username">充值金额：</label>
		<input name = "curMoney" type = "text">
		</div>
		<br/>
	<div class="int">
	<label for="email">您的密码：</label>
		<input name = "Passwords" type = "password">
		</div>
		<br/>
	<input type = "submit" value = "充值确认">
		<br />
	<br />
</form>

	
	<br/>
	<br/>
	<br/>
<a href="main.php">返回主界面</a><br/>		
		
<body/>
<html/>		