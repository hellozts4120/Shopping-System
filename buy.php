<?php
	session_start();
	error_reporting(0);
?>

<html>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 1684px;
	height: 115px;
	z-index: 2;
	left: 0px;
	top: 0px;
	background-color: #FFA500;
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
  <h1>&nbsp;&nbsp;旦 淘 网 <small>购物管理中心
  <span class="glyphicon glyphicon-heart" style="color:red;" aria-hidden="true"></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <small>
  <p1><B>不想买了？</B><p1/><a href="main.php">点击这里返回主界面！</a><br/>
  </small>
  </small>
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;淘在复旦，淘你所爱</h4>
  </h1>
  </div>
</head>
<body>
<br/>
<br/>

<p>&nbsp;</p>
<br/>
<form action = "BuyAssure.php" method = "post" align = "center">
	<p1><B>输入想要购买物品的编号：&nbsp;&nbsp;&nbsp;</B></p1> <input name = "ProductID" type = "text" style = "height:40px;">
	<input type = "submit" value = "查询编号" style = "height:40px;">
		<br />
	<br />
</form>

<form action = "jump2.php" method = "post" name = "Add" align = "center">
	<p1><B>选择操作：</B></p1>
    <select name="select" style = "height:40px;">
      <option value ="ID" selected="selected">收藏物品</option>
      <option value ="Seller">关注卖家</option>
      <option value ="DeleteID">取消收藏</option>
      <option value ="DeleteSeller">取消关注</option>
    </select>
    &nbsp;&nbsp;&nbsp;
    <input style = "height:40px;" size = "20" name = "AddObj" type = "text" value = "请输入指定信息">
	<input type = "submit" style = "height:40px;" value = "确认操作">
	<input type="hidden" name="heihei">
</form>

<h2 class="sub-header"><span style="color:red;background-color: #00FFFF">您关注的用户</span></h2>
<div class="table-responsive">
	<table class="table table-striped">
	<thead>
	<tr>
		<th>关注的人</th>
		<th>商品编号</th>
		<th>商品名称</th>
		<th>商品价格</th>
    </tr>
	</thead>
	<tbody>

<?php
	echo "<B>"."<span style='color:red;background-color: yellow'>"."您关注的人有："."</span>"."</B>";
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$request1 = mysql_query("SELECT * FROM GuanZhu WHERE YourName = '$_SESSION[UserID]'");
	while($GuanZhuOut = mysql_fetch_array($request1)){
		echo "&nbsp;&nbsp;"."<B>".$GuanZhuOut[GuanZhuName]."</B>";
		$requestData = mysql_query("SELECT * FROM Product WHERE OwnerID = '$GuanZhuOut[GuanZhuName]'");
		while($DataOut = mysql_fetch_array($requestData)){
			echo "<tr>";
			echo "<td class='warning'>".$GuanZhuOut[GuanZhuName]."</td>";
			echo "<td class='success'>".$DataOut[ProductID]."</td>";
			echo "<td class='success'>".$DataOut[ProductName]."</td>";
			echo "<td class='success'>".$DataOut[Price]."</td>";
			echo "</tr>";
		}
	}
	echo "<br/>";
	mysql_close($con);
?>
	</tbody>
</table>
</div>

<h2 class="sub-header"><span style="color:red;background-color: #00FFFF">您收藏的商品</span></h2>
<div class="table-responsive">
	<table class="table table-striped">
	<thead>
	<tr>
		<th>商品编号</th>
		<th>商品名称</th>
		<th>商品价格</th>
    </tr>
	</thead>
	<tbody>
	<?php
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$request2 = mysql_query("SELECT * FROM ShouCang WHERE UserID = '$_SESSION[UserID]'");
	while($ShouCangOut = mysql_fetch_array($request2)){
		$requestData = mysql_query("SELECT * FROM Product WHERE ProductID = '$ShouCangOut[ProductID]'");
		$DataOut = mysql_fetch_array($requestData);
		echo "<tr>";
		echo "<td class='success'>".$DataOut[ProductID]."</td>";
		echo "<td class='success'>".$DataOut[ProductName]."</td>";
		echo "<td class='success'>".$DataOut[Price]."</td>";
		echo "</tr>";
	}
	mysql_close($con);
?>

	</tbody>
</table>
</div>


<br/>
</body>
</html>