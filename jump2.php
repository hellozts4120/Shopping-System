<?php
	session_start();
	error_reporting(0);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
	$AddObj = $_POST[AddObj];
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	if($_POST[select] == 'ID'){
		$request = mysql_query("SELECT * FROM Product WHERE ProductID = '$AddObj'");
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
				if($DataOut[OwnerID] == $_SESSION[UserID]){
					echo "抱歉，自己不能收藏自己的商品！";
					echo '<br/>';
				}
				else{
					$haha = 1;
					$request1 = mysql_query("SELECT * FROM ShouCang WHERE ProductID = '$AddObj'");
					while($DataOut1 = mysql_fetch_array($request1)){
						if($DataOut1[UserID] == $_SESSION[UserID]){
							$haha = 0;
						}
					}
					if($haha == 1){
						echo "收藏商品成功！"."<br/>";
						$re = mysql_query("INSERT INTO ShouCang(UserID,ProductID) VALUES ('$_SESSION[UserID]','$AddObj')");
					}
					else{
						echo "抱歉，您已经收藏过这个商品了！"."<br/>";
					}
				}
			}
		}
	}
	else if($_POST[select] == 'DeleteID'){
		$request = mysql_query("SELECT * FROM ShouCang WHERE ProductID = '$AddObj' AND UserID = '$_SESSION[UserID]'");
		if(!$request){
			echo "抱歉，未查询到指定收藏记录！";
			echo '<br/>';
		}
		else{
			while($DataOut = mysql_fetch_array($request)){
				$re = mysql_query("DELETE FROM ShouCang WHERE ProductID = '$DataOut[ProductID]' AND UserID = '$DataOut[UserID]'");
			}
			echo "删除操作完成！"."<br/>";
		}
	}
	else if($_POST[select] == 'Seller'){
		$request = mysql_query("SELECT * FROM Users WHERE UserID = '$AddObj'");
		if(!$request){
			echo "抱歉，未查询到指定用户！";
			echo '<br/>';
		}
		else{
			$DataOut = mysql_fetch_array($request);
			if(!$DataOut){
				echo "抱歉，未查询到指定用户！";
				echo '<br/>';
			}
			else{
				if($DataOut[UserID] == $_SESSION[UserID]){
					echo "抱歉，自己不能关注自己！";
					echo '<br/>';
				}
				else{
					$haha = 1;
					$request1 = mysql_query("SELECT * FROM GuanZhu WHERE GuanZhuName = '$AddObj'");
					while($DataOut1 = mysql_fetch_array($request1)){
						if($DataOut1[YourName] == $_SESSION[UserID]){
							$haha = 0;
						}
					}
					if($haha == 1){
						echo "关注用户成功！"."<br/>";
						$re = mysql_query("INSERT INTO GuanZhu(YourName,GuanZhuName) VALUES ('$_SESSION[UserID]','$AddObj')");
					}
					else{
						echo "抱歉，您已经关注过这个用户了！"."<br/>";
					}
				}
			}
		}
	}
	else if($_POST[select] == 'DeleteSeller'){
		$request = mysql_query("SELECT * FROM GuanZhu WHERE GuanZhuName = '$AddObj' AND YourName = '$_SESSION[UserID]'");
		$DataOut = mysql_fetch_array($request);
		$re = mysql_query("DELETE FROM GuanZhu WHERE GuanZhuName = '$DataOut[GuanZhuName]' AND YourName = '$DataOut[YourName]'");
		echo "解除关注操作完成！"."<br/>";
	}
	echo "2秒后返回上层页面！";
	header("Refresh:3;url = buy.php");
	mysql_close($con);
?>

<a href="buy.php">返回上层页面</a><br/>		
</head>
</html>