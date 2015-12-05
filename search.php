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
  <h1>&nbsp;&nbsp;旦 淘 网 <small>查询中心
  <span class="glyphicon glyphicon-heart" style="color:red;" aria-hidden="true"></span>
  </small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small></h1>
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;淘在复旦，淘你所爱</h4>
  </div>
<HR style="FILTER: alpha(opacity=100,finishopacity=0,style=2)" width="80%" color=#987cb9 SIZE=20>
<p>&nbsp;</p>
<h1 align="center"><span style="color:red;background-color: yellow">查询商品信息</span></h1>
</head>
<body>

<p>&nbsp;</p>
<form action = "?action=ask" method = "post" align = "center">
	<p1><B>输入编号查询：</B></p1> <input style = "height:30px;" name = "ProductID" type = "text" align="center">
	<input type = "submit" class="btn btn-primary" value = "编号查询">
		<br />
	<br />
	<p2><B>卖家姓名查询：</B></p2> <input style = "height:30px;" name = "UserID" type = "text">
	<input type = "submit" class="btn btn-primary" value = "姓名查询">
		<br />
	<br />
	<p2><B>商品模糊查询：</B></p2> <input style = "height:30px;" name = "ProName" type = "text">
	<input type = "submit" class="btn btn-primary" value = "模糊查询">
</form>

<br/>
<br/>
<hr />
<B><u><p align="center"><span style="font-size:20pt;color:red;background-color: yellow">查询结果</span></p></u></B>

<form align = "center">

<?php
	if($_GET['action'] == 'ask'){
		$ProductID = $_POST[ProductID];
		$UserID = $_POST[UserID];
		$ProName = $_POST[ProName];
	}
	$MainSearch = $_POST[MainSearch];
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	if($_POST[select] == 'ID'){
		$request = mysql_query("SELECT * FROM Product WHERE ProductID = '$MainSearch'");
		if(!$request){
			echo "抱歉，未查询到指定编号商品！";
			echo '<br/>';
		}
		else{
			$DataOut = mysql_fetch_array($request);
			if(!$DataOut){
				echo "抱歉，未查询到指定编号商品！";
				echo '<br/>';
			}
			else{
				echo '<B>'.'<u>'.'<p style="font-size:15pt;color:red;text-align:center";>'."指定编号商品信息为：".'<p>'.'</u>'.'</B>';
				echo "<br />";
				echo "商品编号：".$DataOut['ProductID']." ";
				echo "商品名称：".$DataOut['ProductName']." ";
				echo "商品价格：".$DataOut['Price']." ";
				echo "所有人：".$DataOut['OwnerID']."<br/>";
			}
		}
	}
	else if($_POST[select] =='Seller'){
		$request = mysql_query("SELECT * FROM Product WHERE OwnerID = '$MainSearch'");
		if(!$request){
			echo "抱歉，未查询到指定卖家！";
			echo '<br/>';
		}
		else{
			$isout = false;
			echo '<B>'.'<u>'.'<p style="font-size:15pt;color:red;text-align:center";>'."指定卖家的所有商品信息为：".'<p>'.'</u>'.'</B>';
			echo "<br />";
			while($DataOut = mysql_fetch_array($request)){
				$quest = mysql_query("SELECT * FROM Product WHERE ProductID = '$DataOut[ProductID]'");
				$DataOutReal = mysql_fetch_array($quest);
				echo "商品编号：".$DataOutReal['ProductID']." ";
				echo "商品名称：".$DataOutReal['ProductName']." ";
				echo "商品价格：".$DataOutReal['Price']." ";
				echo "<br />";
				$isout = true;
			}
			if(!$isout){
				echo "抱歉，未查询到指定卖家发布的信息！";
				echo '<br/>';
			}
		}
	}
	else if($_POST[select] == 'Mohu'){
		$request4 = mysql_query("SELECT * FROM Product WHERE ProductName LIKE '%$MainSearch%'");
		if(!$request1 && !$request2 && !$request3 && !$request4){
			echo "抱歉，未查询到指定信息的商品！";
		}
		else{
			echo '<B>'.'<u>'.'<p style="font-size:15pt;color:red;text-align:center";>'."模糊搜索所得结果为：".'<p>'.'</u>'.'</B>';
			while($DataOutReal = mysql_fetch_array($request4)){
				echo "商品编号：".$DataOutReal['ProductID']." ";
				echo "商品名称：".$DataOutReal['ProductName']." ";
				echo "商品价格：".$DataOutReal['Price']." ";
				echo "所有人：".$DataOutReal['OwnerID'];
				echo "<br />";
			}
		}
	}
	if((!empty($_POST[ProductID])) && empty($_POST[UserID]) && empty($_POST[ProName])){
		$request = mysql_query("SELECT * FROM Product WHERE ProductID = '$ProductID'");
		if(!$request){
			echo "抱歉，未查询到指定编号商品！";
			echo '<br/>';
		}
		else{
			$DataOut = mysql_fetch_array($request);
			if(!$DataOut){
				echo "抱歉，未查询到指定编号商品！";
				echo '<br/>';
			}
			else{
				echo '<B>'.'<u>'.'<p style="font-size:15pt;color:red;text-align:center";>'."指定编号商品信息为：".'<p>'.'</u>'.'</B>';
				echo "商品编号：".$DataOut['ProductID']." ";
				echo "商品名称：".$DataOut['ProductName']." ";
				echo "商品价格：".$DataOut['Price']." ";
				echo "所有人：".$DataOut['OwnerID'];
			}
		}
	}
	else if((!empty($_POST[UserID])) && empty($_POST[ProductID]) && empty($_POST[ProName])){
		$request = mysql_query("SELECT * FROM Product WHERE OwnerID = '$UserID'");
		if(!$request){
			echo "抱歉，未查询到指定卖家！";
			echo '<br/>';
		}
		else{
			$isout = false;
			echo '<B>'.'<u>'.'<p style="font-size:15pt;color:red;text-align:center";>'."指定卖家的所有商品信息为：".'<p>'.'</u>'.'</B>';
			echo "<br />";
			while($DataOut = mysql_fetch_array($request)){
				$quest = mysql_query("SELECT * FROM Product WHERE ProductID = '$DataOut[ProductID]'");
				$DataOutReal = mysql_fetch_array($quest);
				echo "商品编号：".$DataOutReal['ProductID']." ";
				echo "商品名称：".$DataOutReal['ProductName']." ";
				echo "商品价格：".$DataOutReal['Price']." ";
				echo "<br />";
				$isout = true;
			}
			if(!$isout){
				echo "抱歉，未查询到指定卖家发布的信息！";
			}
		}
	}
	else if((!empty($_POST[ProName])) && empty($_POST[ProductID]) && empty($_POST[UserID])){
		$request4 = mysql_query("SELECT * FROM Product WHERE ProductName LIKE '%$ProName%'");
		if(!$request4){
			echo "抱歉，未查询到指定信息的商品！";
		}
		else{
			echo '<B>'.'<u>'.'<p style="font-size:15pt;color:red;text-align:center";>'."模糊搜索所得结果为：".'<p>'.'</u>'.'</B>';
			while($DataOutReal = mysql_fetch_array($request4)){
				echo "商品编号：".$DataOutReal['ProductID']." ";
				echo "商品名称：".$DataOutReal['ProductName']." ";
				echo "商品价格：".$DataOutReal['Price']." ";
				echo "所有人：".$DataOutReal['OwnerID'];
				echo "<br />";
			}
		}
	}
	else{
		if(!isset($_POST[MainSearch])){
			echo "输入有误！请重新输入！";
			echo '<br/>';
		}
	}
	mysql_close($con);
?>

</form>

	<br/>
<br/>
<a href = "buy.php">去购买</a><br/>
<a href = "main.php">返回主界面</a><br/>
</body>
</html>