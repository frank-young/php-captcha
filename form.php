
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset = "utf-8">
</head>
<body>
<form action="doCaptcha.php" method="post">
<ul>
			<li>用户名</li>
			<li><input name="username" placehoder="请输入管理员账户" type="text" ></li>
			<li>密码</li>
			<li><input name="password" type="password" ></li>
			<li>验证码</li>
			<li><input name="authcode" type="text"  >
			<img id="captcha_img" src="./captcha.php?r=<?php echo rand(); ?>" alt="验证码" />
			<a href="javascript:;" onclick="chang()">换一个</a>
			</li>
			<li><input type="submit" value="go" ></li>
		</ul>
		</form>
<script type="text/javascript">
function chang(){
	var cap = document.getElementById("captcha_img");
	cap.src = './captcha.php?r=' + Math.random();
	}
</script>
</body>
</html>