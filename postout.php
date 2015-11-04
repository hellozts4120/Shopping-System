<?php
	session_start();
	error_reporting(0);
?>

<html>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<p1>发布者：</p1>
	<?php	echo $_SESSION[UserID]
	?>
	<br/>
<p2>联系方式：</p2>
	<br/>
<p3>商品信息：</p3>

<form action = "postout_input.php" method = "post">
	<p1>商品编号:</p1> <input name = "ProductID" type = "text">
	<br/>
	<p1>商品名称:</p1> <input name = "ProductName" type = "text">
	<br/>
	<p1>商品价格:</p1> <input name = "Price" type = "text">
	<br/>
<textarea cols = "70" rows = "20" name = "PostOut">
</textarea>
<br/>
<input type = "submit">

</form>

<a href = "main.php">返回主界面</a><br/>
</body>
</html>