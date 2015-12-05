<?php
	session_start();
	error_reporting(0);
?>

<html>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 100%;
	height: 79px;
	z-index: 1;
	left: 0px;
	top: 0px;
	background-color: #6C9
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="dashboard.css" rel="stylesheet">
   <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
   <script src="scripts/jquery.min.js"></script>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="bootstrap/css/site.css" rel="stylesheet">
   <link href="bootstrap/css/buttons.css" rel="stylesheet">
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <div id="apDiv1">
  <h1>&nbsp;&nbsp;旦 淘 网 <small>管理中心
  <span class="glyphicon glyphicon-heart" style="color:red;" aria-hidden="true"></span>
  </small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><a href="logout.php">注销</a></small></h1>
</head>
</div>
<body>
<br/>
<br/>

<h2 class="sub-header"><span style="color:red;background-color: #00FFFF">用户信息</span></h2>
<div class="table-responsive">
	<table class="table table-striped">
	<thead>
	<tr>
		<th>用户名</th>
		<th>用户密码</th>
		<th>账户金额</th>
    </tr>
	</thead>
	<tbody>

	<?php
		$con = mysql_connect("localhost","root","zts1996412");
		if(!$con){
			die("Fail to connect to the database:".mysql_error());
		}
		mysql_select_db("portal",$con);
		$request1 = mysql_query("SELECT * FROM Users");
		echo "<B>"."当前全站用户信息："."</B>"."<br/>";
		echo "<br/>";
		while($UsersInfo = mysql_fetch_array($request1)){
			$re = mysql_query("SELECT * FROM Account WHERE UserID = '$UsersInfo[UserID]'");
			$money = mysql_fetch_array($re);
			echo "<tr>";
			echo "<td class='success'>".$UsersInfo[UserID]."</td>";
			echo "<td class='info'>".$UsersInfo[Passwords]."</td>";
			echo "<td class='warning'>".$money[Money]."</td>";
			echo "</tr>";
		}
		mysql_close($con);
	?>	
	</tbody>
</table>
</div>

<h2 class="sub-header"><span style="color:red;background-color: #00FFFF">商品信息</span></h2>
<div class="table-responsive">
	<table class="table table-striped">
	<thead>
	<tr>
		<th>商品 I D</th>
		<th>商品名称</th>
		<th>价格</th>
		<th>所有人</th>
    </tr>
	</thead>
	<tbody>

	<?php
		$con = mysql_connect("localhost","root","zts1996412");
		if(!$con){
			die("Fail to connect to the database:".mysql_error());
		}
		mysql_select_db("portal",$con);
		$request2 = mysql_query("SELECT * FROM Product ORDER BY ProductID");
		echo "<B>"."当前全站商品信息："."</B>"."<br/>";
		echo "<br/>";
		while($ProductInfo = mysql_fetch_array($request2)){
			echo "<tr>";
			echo "<td class='success'>".$ProductInfo[ProductID]."</td>";
			echo "<td class='info'>".$ProductInfo[ProductName]."</td>";
			echo "<td class='active'>".$ProductInfo[Price]."</td>";
			echo "<td class='warning'>".$ProductInfo[OwnerID]."</td>";
			echo "</tr>";
		}
		mysql_close($con);
	?>
	</tbody>
</table>
</div>	

<form action = "?action=ask" method = "post">
	<p1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;删除违规商品&nbsp;&nbsp;</p1> <input name = "ProductID" type = "text">
	&nbsp;&nbsp;<input type = "submit" value = "输入商品编号">
		<br />
	<br />
	<p2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;封禁违规用户&nbsp;&nbsp;</p2> <input name = "UserID" type = "text">
	&nbsp;&nbsp;<input type = "submit" value = "输入用户 I D">
</form>

<?php
	if($_GET['action'] == 'ask'){
		$ProductID = $_POST[ProductID];
		$UserID = $_POST[UserID];
	}
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	if(!empty($_POST[ProductID]) && empty($_POST[UserID])){
		$request = mysql_query("SELECT * FROM Product WHERE ProductID = '$ProductID'");
		if(!$request){
			echo "抱歉，未查询到指定编号商品！";
		}
		else{
			$DataOut = mysql_fetch_array($request);
			if(!$DataOut){
				echo "抱歉，未查询到指定编号商品！";
			}
			else{
				mysql_query("DELETE FROM Product WHERE ProductID = '$ProductID'");
				echo "删除成功！";
				header("Refresh:3;url = manage.php");
			}
		}
	}
	else if(!empty($_POST[UserID]) && empty($_POST[ProductID])){
		$request = mysql_query("SELECT * FROM Users WHERE UserID = '$UserID'");
		if(!$request){
			echo "抱歉，未查询到指定卖家！";
		}
		else{
			$DataOut = mysql_fetch_array($request);
			if(!DataOut){
				echo "抱歉，未查询到指定卖家！";
			}
			else{
				mysql_query("DELETE FROM Product WHERE OwnerID = '$DataOut[UserID]'");
				mysql_query("DELETE FROM Account WHERE UserID = '$DataOut[UserID]'");
				mysql_query("DELETE FROM Users WHERE UserID = '$DataOut[UserID]'");
				echo "删除成功！";
				header("Refresh:3;url = manage.php");
			}
		}
	}
	else{
		echo "输入有误！请重新输入！";
	}
?>

<a href="logout.php">注销</a>
<body/>
<html/>