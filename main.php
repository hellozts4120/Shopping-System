<?php
	session_start();
	
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="scripts/jquery.min.js"></script>
   <script src="scripts/stickUp.min.js"></script>
   <link href="bootstrap/css/buttons.css" rel="stylesheet">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="bootstrap/css/site.css" rel="stylesheet">
   <script src="bootstrap/js/bootstrap.min.js"></script>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 1260px;
	height: 351px;
	z-index: 1;
	left: 179px;
	top: 268px;
	font-size: 14px;
}
#apDiv2 {
	position: absolute;
	width: 1684px;
	height: 115px;
	z-index: 2;
	left: 0px;
	top: 0px;
	background-color: #FFA500;
}
#apDiv3 {
	position: absolute;
	width: 347px;
	height: 66px;
	z-index: 2;
	left: 120px;
	top: 8px;
	font-size: xx-large;
	font-family: "Microsoft YaHei UI";
	color: #FFF;
}
.textarea{
	border:thin solid #696;
	height: 30px;
	width: 220px;
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

</style>
<link href="../../../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css">
<script src="../../../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>

<body>

<div id="apDiv1">
  <div align="center">
  
<form action = "search.php" method = "post" name = "SearchHere">
    <select name="select" style = "height:40px;">
      <option value ="ID" selected="selected">编号查询</option>
      <option value ="Seller">卖家查询</option>
      <option value ="Mohu">模糊查询</option>
    </select>
    <input style = "height:40px;" size = "80" name = "MainSearch" type = "text">
	<input type = "submit" style = "height:40px;" value = "查询">
	<input type="hidden" name="haha">
</form>
<script language="javascript" type="text/javascript">
function getindex(){
	SearchHere.haha.value=select.selectedIndex;
}
</script>
<p>&nbsp;</p>
    <p>
    <a href="storage.php"><img src="IMG/goods.jpg" name="img1" width="163" height="163" /></a>
    <a href="buy.php"><img src="IMG/buy.jpg" name="img2" width="163" height="163" /></a>
    <a href="logout.php"><img src="IMG/exit.jpg" name="img3" width="163" height="163" /></a>
    </p>
  </div>
</div>


<div id="apDiv2">
	<h1>&nbsp;&nbsp;旦 淘 网 <small>Follow your heart
  <span class="glyphicon glyphicon-heart" style="color:red;" aria-hidden="true"></span>
  </small></h1>
	<h4>&nbsp;&nbsp;&nbsp;&nbsp;淘在复旦，淘你所爱</h4>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="container-fluid">
<div class="row">
	<div class="col-sm-3 col-md-2 sidebar" style="background-color:#F0F8FF;">
		<ul class="nav nav-sidebar">
			<li class="active"><a href="#">&nbsp;&nbsp;&nbsp;主 页 <span class="sr-only">(current)</span></a></li>
            <li><a href="storage.php">快速导航</a></li>
            <li><a href="search.php">查询商品</a></li>
            <li><a href="buy.php">购买商品</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li><a href="postout.php">商品增删</a></li>
            <li><a href="account.php">管理账户</a></li>
            <li><a href="logout.php">退出账号</a></li>
        </ul>
    </div>

<body/>
<html/>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>