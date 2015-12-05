<html>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 100%;
	height: 79px;
	z-index: 1;
	background-color: #6C9
}
#apDiv2 {
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
#apDiv3 {
	position: absolute;
	width: 343px;
	height: 285px;
	z-index: 2;
	left: 234px;
	top: 242px;
	border: solid;
	border-color: #696;
	font-family: "Microsoft YaHei UI";
}
#apDiv4 {
	position: absolute;
	width: 322px;
	height: 318px;
	z-index: 3;
	left: 21px;
	top: 3px;
	font-size: medium;
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
body {
	background-image: url(IMG/pic2.png);
	background-size:100%;
	background-repeat:no-repeat;
	overflow:hidden;
}
</style>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <script src="scripts/jquery.min.js"></script>
   <script src="scripts/stickUp.min.js"></script>
   <link href="bootstrap/css/buttons.css" rel="stylesheet">
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="bootstrap/css/site.css" rel="stylesheet">
   <script src="bootstrap/js/bootstrap.min.js"></script>
<div id="apDiv1">
  <div id="apDiv2">
  <p1>管理员登录</p1>
  </div>
</div>
<div id="apDiv3">
    <div id="apDiv4">
      <form action = "jump.php" method = "post">
      <br/>
      <br/>
		<p>
		  <p1>用户名:</p1>
		  &nbsp;<input name = "AdminName" type = "text" class = "textarea"> 
		<br/><br/>
        <p2>密  码:&nbsp;&nbsp;</p2>
        &nbsp;<input name = "AdminPass" type = "password" class = "textarea"> 
		<br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type = "submit" class = "btn btn-primary" value = "登录">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="index.php" class="btn btn-danger" role="button">返回上层</a>
      </form>
		</p>
	  </p>	
    </div>
</div>
	
<body/>
<html/>