<html>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 343px;
	height: 348px;
	z-index: 1;
	left: 223px;
	top: 225px;
	border: solid #696;
}

#apDiv2 {
	position: absolute;
	width: 336px;
	height: 354px;
	z-index: 2;
	left: 20px;
	top: 4px;
	font-family: "Microsoft YaHei UI";
	font-size: medium;
}
.btn{
	background:#096;
	font-weight:normal;
	border:none;
	width: 100px;
	height: 40px;
	font-size:large;
	color: #FFF;
}
.textarea{
	border:thin solid #696;
	height: 30px;
	width: 220px;
}
body {
	background-image:url(IMG/pic1.jpg);
	background-size:100%;
	background-repeat:no-repeat;
}
</style>
<script type="text/javascript">
function MM_setTextOfTextfield(objId,x,newText) { //v9.0
  with (document){ if (getElementById){
    var obj = getElementById(objId);} if (obj) obj.value = newText;
  }
}
</script>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <script src="scripts/jquery.min.js"></script>
   <script src="scripts/stickUp.min.js"></script>
   <link href="bootstrap/css/buttons.css" rel="stylesheet">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="bootstrap/css/site.css" rel="stylesheet">
   <script src="bootstrap/js/bootstrap.min.js"></script>
  <div class="page-header">
  <h1>&nbsp;&nbsp;旦 淘 网 <small>Follow your heart
  <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
  </small></h1>
</div>
</head>

<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<form action = "?action=ask" method = "post">
	<ul>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><p1>输入 I D&nbsp;<p1/> <input name = "UserID" type = "text"></li>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><p2>输入密码<p2/> <input name = "Passwords" type = "password"></li>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><p3>确认密码<p3/> <input name = "RePasswords" type = "password"></li>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><p4>输入性别<p4/> <input name = "SEX" type = "text"></li>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li><p5>输入年龄<p5/> <input name = "AGE" type = "text"></li>
		</ul>
		<br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" type = "submit" value = "提交信息">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-danger" role="button">返回上层</a><br/>	
	<br/>
<br/>	
</form>

&nbsp;&nbsp;&nbsp;&nbsp;<textarea cols = "50" rows = "3" name = "HAHA">
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
		echo "关键信息输入不能为空！"."\n";
		echo "确认所有项目均已正确填写！";
	}
	mysql_close($con);
?>
</textarea>
<br/>	
		
<body/>
<html/>		