<?php
	session_start();
	error_reporting(0);
	
?>
<!DOCTYPE html>
<html>
<style type="text/css">
#apDiv1 {
  position: absolute;
  width: 1684px;
  height: 109px;
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
  <h1>&nbsp;&nbsp;旦 淘 网 <small>快速导航
  <span class="glyphicon glyphicon-heart" style="color:red;" aria-hidden="true"></span>
  </small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small></h1>
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;淘在复旦，淘你所爱</h4>
  </div>
</head>
<body>

<p>&nbsp;</p>
<p>&nbsp;</p>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="main.php">首页</a>
    </div>

    <!-- 导航栏内容 -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="storage.php">我的商品 <span class="sr-only">(current)</span></a></li>
        <li><a href="#" data-toggle="modal" data-target="#Info">个人资料</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">管理我的商品 <span class="caret"></span></a>
          <ul class="dropdown-menu navbar-inverse">
            <li><a data-toggle="modal" data-target="#Post" style="color:#696969">发布商品</a></li>
            <li role="separator" class="divider"></li>
            <li><a data-toggle="modal" data-target="#delete" style="color:#696969">删除商品</a></li>
            <li role="separator" class="divider"></li>
            <li><a data-toggle="modal" data-target="#change" style="color:#696969">更改价格</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">管理我的账户 <span class="caret"></span></a>
          <ul class="dropdown-menu navbar-inverse">
            <li><a data-toggle="modal" data-target="#remain" style="color:#696969">余额查询</a></li>
            <li role="separator" class="divider"></li>
            <li><a data-toggle="modal" data-target="#charge" style="color:#696969">账户充值</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
      <form action = "?action=ask" method = "post" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="key" class="form-control" placeholder="搜索我的商品">
        </div>
        <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#KEY">查询</button>
      </form>
        <li><a href="logout.php">退出账号</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="modal fade" id="Info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">您的个人信息为：</h4>
      </div>
      <div class="modal-body">
        <?php
  $con = mysql_connect("localhost","root","zts1996412");
  if(!$con){
    die("Fail to connect to the database:".mysql_error());
  }
  mysql_select_db("portal",$con);
  $request = mysql_query("SELECT * FROM Account WHERE UserID = '$_SESSION[UserID]'");
  $request1 = mysql_query("SELECT * FROM Users WHERE UserID = '$_SESSION[UserID]'");
  $accData = mysql_fetch_array($request);
  $personData = mysql_fetch_array($request1);
  echo "您的 I D:"."&nbsp;&nbsp;&nbsp;".$personData[UserID]."<br/>";
  echo "您的性别:"."&nbsp;&nbsp;&nbsp;".$personData[SEX]."<br/>";
  echo "您的年龄:"."&nbsp;&nbsp;&nbsp;".$personData[AGE]."<br/>";
  mysql_close($con);
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="button button-rounded button-small" data-dismiss="modal">确认</button>
      </div>
    </div>
  </div>
</div>



<!--模态框3用于发布商品-->
<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">输入所需信息：</h4>
      </div>
      <div class="modal-body">

        <form name = "Post" action = "jump3.php" method = "post">
           <div class="input-group">
           <span class="input-group-addon">商品编号</span>
             <input type="text" name="ProductID" class="form-control" placeholder = "输入商品编号">
           </div>
         <br/>
            <div class="input-group">
            <span class="input-group-addon">￥</span>
             <input type="text" name="NewPrice" class="form-control" placeholder = "输入新的价格">
             <span class="input-group-addon">元</span>
           </div>
         <br/>  

      </div>
      <div class="modal-footer">
      <button type="button" class="button button-rounded button-small" data-dismiss="modal">取消</button>
        <button type="submit" class="button button-primary button-rounded button-small">确认发布</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!--模态框3用于发布商品-->
<div class="modal fade" id="Post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">输入所需信息：</h4>
      </div>
      <div class="modal-body">

        <form name = "Post" action = "postout_input.php" method = "post">
           <div class="input-group">
           <span class="input-group-addon">商品编号</span>
             <input type="text" name="ProductID" class="form-control" placeholder = "输入商品编号">
           </div>
         <br/>
            <div class="input-group">
            <span class="input-group-addon">商品名称</span>
             <input type="text" name="ProductName" class="form-control" placeholder = "输入商品名称">
           </div>
         <br/>
            <div class="input-group">
            <span class="input-group-addon">￥</span>
             <input type="text" name="Price" class="form-control" placeholder = "输入商品价格">
             <span class="input-group-addon">元</span>
           </div>
         <br/>  

      </div>
      <div class="modal-footer">
      <button type="button" class="button button-rounded button-small" data-dismiss="modal">取消</button>
        <button type="submit" class="button button-primary button-rounded button-small">确认发布</button>
      </div>
      </form>
    </div>
  </div>
</div>



<!--模态框4用于删除商品-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">输入删除商品编号：</h4>
      </div>
      <div class="modal-body">

      <form name = "Post" action = "isdelete.php" method = "post">
           <div class="input-group">
           <span class="input-group-addon">商品编号</span>
             <input type="text" name="ProductID" class="form-control" placeholder = "商品编号">
           </div>
         <br/>

      </div>
      <div class="modal-footer">
      <button type="button" class="button button-rounded button-small" data-dismiss="modal">取消</button>
        <button type="submit" class="button button-primary button-rounded button-small">确认删除</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!--模态框2用于余额查询-->
<div class="modal fade" id="remain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">您的账户余额为：</h4>
      </div>
      <div class="modal-body">
        <?php
	$con = mysql_connect("localhost","root","zts1996412");
	if(!$con){
		die("Fail to connect to the database:".mysql_error());
	}
	mysql_select_db("portal",$con);
	$request = mysql_query("SELECT * FROM Account WHERE UserID = '$_SESSION[UserID]'");
	if($request){
		$curMoney = mysql_fetch_array($request);
		echo $curMoney[Money]."元"."<br/>";
	}
	else{
		echo "账户出错！"."<br/>";
	}
	mysql_close($con);
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="button button-rounded button-small" data-dismiss="modal">确认</button>
      </div>
    </div>
  </div>
</div>


<!-- 模态框1用于充值 -->
<div class="modal fade" id="charge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        <span class="input-group-addon">元</span>
     </div>
		<br/>
        <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">
        <span class="glyphicon glyphicon-lock" aria-hidden="true">
        </span></span>
        <input type="password" name="Passwords" class="form-control" placeholder="请输入密码" aria-describedby="basic-addon1">
         </div>
     </div>
      <div class="modal-footer">
        <button type="button" class="button button-rounded button-small" data-dismiss="modal">取消</button>
        <button type="submit" class="button button-primary button-rounded button-small">确认充值</button>
        </form>
      </div>
    </div>
  </div>
</div>

 


<!--stickUp用于固定导航栏-->
 <script type="text/javascript"> //initiating jQuery 
 jQuery(function($) { 
 $(document).ready( function() { 
 //enabling stickUp on the '.navbar-wrapper' class 
 $("navbar navbar-default").stickUp();
  }); 
  });
 </script>



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
  if($_GET['action'] == 'ask'){
    echo '<h2 class="sub-header">'.'<span style="color:red;background-color: #000000">'.'查询结果：'.'</span>'.'</h2>';
    $key = $_POST[key];
    if($key){
      $request = mysql_query("SELECT * FROM Product WHERE OwnerID = '$_SESSION[UserID]' AND ProductName LIKE '%$key%'");
    }
  }
  else{
    echo '<h2 class="sub-header">'.'<span style="color:red;background-color: #000000">'.'您已发布：'.'</span>'.'</h2>';
	  $request = mysql_query("SELECT * FROM Product WHERE OwnerID = '$_SESSION[UserID]'");
  }
	if($request){
		while($row = mysql_fetch_array($request)){
      echo "<tr>";
			$TempID = $row['ProductID'];
			$search1 = mysql_query("SELECT * FROM Product WHERE ProductID = '$TempID'");
			$DataOut = mysql_fetch_array($search1);
			echo "<td class='success'>".$DataOut['ProductID']."</td>";
      echo "<td class='success'>".$DataOut['ProductName']."</td>";
      echo "<td class='success'>".$DataOut[Price]."</td>";
			echo "</tr>";
		}
	}
	else{
		echo "您还没有发布商品，快去添加商品吧！";
	}
	mysql_close($con);
?>
</tbody>
</table>
</div>

</body>
</html>