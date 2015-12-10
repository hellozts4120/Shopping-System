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
   <script src="scripts/stickUp.min.js"></script>
   <link href="bootstrap/css/buttons.css" rel="stylesheet">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="bootstrap/css/site.css" rel="stylesheet">
   <script src="bootstrap/js/bootstrap.min.js"></script>

  <div id="apDiv1">
  <h1>&nbsp;&nbsp;旦 淘 网 <small>商品增删中心
  <span class="glyphicon glyphicon-heart" style="color:red;" aria-hidden="true"></span>
  </small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small></h1>
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;淘在复旦，淘你所爱</h4>
  </div>
</head>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<body>
<h3>&nbsp;&nbsp;&nbsp;&nbsp;欢迎， 
<?php	
	echo $_SESSION[UserID]." !";
	echo "<br/>";
?>
</h3>
	<br/>

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
	$request = mysql_query("SELECT * FROM Product WHERE OwnerID = '$_SESSION[UserID]'");
	$request1 = mysql_query("SELECT * FROM Product WHERE OwnerID = '$_SESSION[UserID]'");
	if($request){
		if(!(mysql_fetch_array($request1))){
			echo '<h2 class="sub-header">'."&nbsp;&nbsp;&nbsp;".'<span style="color:red;background-color: #000000">'.'您还未发布商品，不用删除，只用发布就可以啦！'.'</span>'.'</h2>';
		}
		else{
			echo '<h2 class="sub-header">'."&nbsp;&nbsp;&nbsp;".'<span style="color:red;background-color: #000000">'.'您已发布：'.'</span>'.'</h2>';
		}
		echo "<br />";
		while($row = mysql_fetch_array($request)){
			$TempID = $row['ProductID'];
			$search1 = mysql_query("SELECT * FROM Product WHERE ProductID = '$TempID'");
			$DataOut = mysql_fetch_array($search1);
			echo "<tr>";
			echo "<td class='success'>".$DataOut['ProductID']."</td>";
			echo "<td class='success'>".$DataOut['ProductName']."</td>";
			echo "<td class='success'>".$DataOut[Price]."</td>";
			echo "</tr>";
		}
	}
	else{
		echo '<h2 class="sub-header">'."&nbsp;&nbsp;&nbsp;".'<span style="color:red;background-color: #000000">'.'您还未发布商品，不用删除，只用发布就可以啦！'.'</span>'.'</h2>';
	}
	mysql_close($con);
?>

</tbody>
</table>
</div>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;想要删除物品？</h3>
<form action = "isdelete.php" method = "post">
	<p1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;输入想要删除的物品编号：</p1> <input name = "ProductID" type = "text">
	<br/>
	<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "submit" value = "删除它！">
		<br />
	<br />
</form>

<HR style="FILTER: progid:DXImageTransform.Microsoft.Shadow(color:#987cb9,direction:145,strength:15)" width="80%" color=#987cb9 SIZE=10 width=5>

<h3>&nbsp;&nbsp;&nbsp;&nbsp;想要发布物品？</h3>
<form action = "postout_input.php" method = "post">
	<p1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品编号:</p1> <input name = "ProductID" type = "text">
	<br/>
	<p1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品名称:</p1> <input name = "ProductName" type = "text">
	<br/>
	<p1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;商品价格:</p1> <input name = "Price" type = "text">
	<br/>
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "submit" value="发布它！">

</form>

<a class="navbar-brand" href="storage.php">&nbsp;&nbsp;返回快速导航</a>
</body>
</html>