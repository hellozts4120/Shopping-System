<?php
	session_start();
	error_reporting(0);
	
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8"  />

<?php
	$ProductID = $_POST[ProductID];
	$NewPrice = $_POST[NewPrice];
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	if(empty($ProductID) || empty($NewPrice)){
		echo "抱歉，您输入的信息不全！"."<br/>";
	}
	if($_POST[ProductID]){
		$request = mysql_query("SELECT * FROM Product WHERE ProductID = '$ProductID' AND OwnerID = '$_SESSION[UserID]'");
		if(!$request){
			echo "抱歉，未于您的商品中查询到指定编号商品！";
			echo '<br/>';
		}
		else{
			$DataOut = mysql_fetch_array($request);
			if(!$DataOut){
				echo "抱歉，未于您的商品中查询到指定编号商品！";
				echo '<br/>';
			}
			else{
				if(!$NewPrice){
					echo "请输入更改后的金额！";
					echo '<br/>';
				}
				else{
					mysql_query("UPDATE Product SET Price = '$NewPrice' WHERE ProductID = '$DataOut[ProductID]'");
					echo "修改成功！".'<br/>';
				}
			}
		}
	}
	mysql_close($con);
	echo "3秒后返回快速导航页面！"."<br/>";
	header("Refresh:3;url = storage.php");
?>

<a href="storage.php">返回上层页面</a><br/>	
</head>
</html>