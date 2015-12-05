<html>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 343px;
	height: 348px;
	z-index: 1;
	left: 223px;
	top: 225px;
	border: solid #696;
}

#apDiv2 {
	position: absolute;
	width: 336px;
	height: 354px;
	z-index: 2;
	left: 20px;
	top: 4px;
	font-family: "Microsoft YaHei UI";
	font-size: medium;
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
.textarea{
	border:thin solid #696;
	height: 30px;
	width: 220px;
}
body {
	background-image:url(IMG/background.png);
	background-size:100%;
	background-repeat:no-repeat;
}
</style>
<script type="text/javascript">
function MM_setTextOfTextfield(objId,x,newText) { //v9.0
  with (document){ if (getElementById){
    var obj = getElementById(objId);} if (obj) obj.value = newText;
  }
}
</script>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<div id="apDiv1">
<div id="apDiv2">
<form action = "login.php" method = "post">

<p>
<p1> 用户名:</p1>
  <input name = "UserID" type = "text" id="username"  class = "textarea" onFocus="MM_setTextOfTextfield('username','','')" value = "请输入用户名" > 
</p>
<p><br/>
<p2>密码：</p2>
   <input name = "Passwords" type = "password" id="password" class = "textarea"> 
</p>
<p><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type = "submit" class = "btn" value = "登录">
</p>
<form/>
没有账号？<a href="signin.php">点击这里注册！</a>
<br/><br/>
<a href="AdminSign.php">管理员登录</a>
</div>
</div>

</body>
</html>