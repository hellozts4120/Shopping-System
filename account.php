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
body {
  background-image:url(IMG/bank.jpg);
  background-size:100%;
  background-repeat:no-repeat;
}
</style>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <script src="scripts/jquery.min.js"></script>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="bootstrap/css/site.css" rel="stylesheet">
   <link href="bootstrap/css/buttons.css" rel="stylesheet">
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <div id="apDiv1">
  <h1>&nbsp;&nbsp;旦 淘 网 <small>个人账户
  <span class="glyphicon glyphicon-heart" style="color:red;" aria-hidden="true"></span>
  </small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small></h1>
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;淘在复旦，淘你所爱</h4>
  </div>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<h1>&nbsp;&nbsp;我的账户</h1>
</head>
<body>
<br/>

<p1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我的用户名：</p1>
	<?php	echo $_SESSION[UserID]
	?>
	<br/>
<p2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我的性别：</p2>
	<?php	
		if($_SESSION[SEX] = 'M'){
			echo "男";
		}
		else{
			echo "女";
		};
	?>
	<br/>
<p3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我的年龄：</p3>
	<?php	echo $_SESSION[AGE];
	?>
	<br/>
    
    <div class="panel panel-success">
    <div class="panel-heading">
    <?php	echo "&nbsp;&nbsp;&nbsp;".$_SESSION[UserID]
	?>
    </div>
       <div class="panel-body">
        &nbsp;&nbsp;&nbsp;账户余额：
<?php
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$request = mysql_query("SELECT * FROM Account WHERE UserID = '$_SESSION[UserID]'");
	if($request){
		$curMoney = mysql_fetch_array($request);
		echo $curMoney[Money]."  元"."<br/>";
	}
	else{
		echo "账户出错！"."<br/>";
	}
	mysql_close($con);
?>
</div>
</div>

<br/>

<!-- Button trigger modal -->
&nbsp;&nbsp;&nbsp;<button type="button" class="button button-glow button-rounded button-highlight" data-toggle="modal" data-target="#myModal">
 充值
</button>
<br/>
<br/>

<a class="navbar-brand" href="storage.php">返回快速导航</a>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">充值窗口</h4>
      </div>
      <div class="modal-body">
    
     <form name = "账户充值" action = "MoneyIn.php" method = "post">
     <div class="input-group">
        <span class="input-group-addon">￥</span>
        <input type="text" name="curMoney" class="form-control" placeholder = "请输入金额" aria-label="Amount (to the nearest dollar)">
     </div>
		<br/>
        <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">
        <span class="glyphicon glyphicon-lock" aria-hidden="true">
        </span></span>
        <input type="password" name="Passwords" class="form-control" placeholder="请输入密码" aria-describedby="basic-addon1">
         </div>
      <div class="modal-footer">
        <button type="button" class="button button-rounded button-small" data-dismiss="modal">取消</button>
        <button type="submit" class="button button-primary button-rounded button-small">确认充值</button>
        </form>
      </div>
    </div>
  </div>
</div>



		
<body/>
<html/>		