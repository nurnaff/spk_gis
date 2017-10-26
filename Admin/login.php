<?php session_start(); ?>
<style>
* {
	margin:0 auto;
	padding:0;	
}

body {
	background-color:#0080C0;
}

#layout {
	background:url(../images/wild_oliva.png);
	-webkit-box-shadow:0 1px 3px #000;
  	-moz-box-shadow:0 1px 3px #000;
  	box-shadow:0 1px 3px #000;
	font-family:Verdana, Geneva, sans-serif;
	margin-top:150px;
	border-radius:12px;
	font-size:11px;
	padding:20px;
	width:500px;
	color:#DDD;
}

#content h2 {
	text-align:center;
	margin-bottom:20px;	
	font-family:Verdana, Geneva, sans-serif;
	font-size:20px;
	color:#DDD;
	text-shadow:0 1px 0 #000;
}

#content .txt {
	color:#DDD;
	padding-right:10px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	text-transform:uppercase;
	text-shadow:0 1px 0 #000;
}

#content .input {
	background:#FFF;
	border:none;
	height:30px;
	padding:8px;
	color:#666;
	margin:3px;
}

.button {
	background-image:-moz-linear-gradient(-90deg,#914E46,#613030);
	background-image:-webkit-linear-gradient(-90deg,#914E46,#613030);
	-webkit-box-shadow:0 1px 3px #000;
  	-moz-box-shadow:0 1px 3px #000;
  	box-shadow:0 1px 3px #000;
	border:none;
	padding:5px;
	margin-top:3px;
	border-radius:3px;
	color:#CDCDCD;
	text-shadow:0 1px 0 #2B5555;
	cursor:pointer;	
}

#content h4 {
	text-align:center;
	padding-bottom:20px;	
}

#content .top {
	background:url(images/dark_stripes.png);
	padding:20px;
	margin-bottom:15px;
	color:#DDD;
	text-shadow:0 1px 0 #000;
	width:400px;
	text-align:center;
	border-radius:10px;
}

#content .bottom {
	background:#FFF;
	padding:20px;
	margin-top:15px;
	border:1px dotted #DDD;
	color:#666;
	width:200px;
	text-align:center;
	-webkit-box-shadow:0 1px 3px #DDD;
  	-moz-box-shadow:0 1px 3px #DDD;
  	box-shadow:0 1px 3px #DDD;
	border-radius:10px;
	margin-bottom:5px;
}

#content .bottom a {
	text-decoration:none;
	color:#333;	
}

#content .bottom a:hover {
	color:#666;
}
</style>
<?php
include "../config/db.php";
if(!isset($_POST["btnlogin"])){
if(!empty($_SESSION["authid"])){
	echo "<script>location.href='index.php'</script>";
}else{
	?>
    <title>Login | Administrator</title>
	<body>
	<div id="layout">
	<div id="content">
	<form method="post" action="">
	<h4>ADMINISTRATOR LOGIN</h4>
	<p class="top">Welcome Administrator, Please Login to your system before!
	<table>
	<tr><td><span class="txt">Username</span></td><td><input type="text" name="username" class="input" /></td></tr>
	<tr><td><span class="txt">Password</span></td><td><input type="password" name="password" class="input" /></td></tr>
	<tr><td></td><td><input type="submit" name="btnlogin" value="Login" class="button" />
	<input type="button" value="Kembali" onClick="self.history.back()" class="button" /></td></tr>
	</table>
	</form>
	</div>
	</div>
	<?php }} else {
	$username = strip_tags(addslashes($_POST["username"]));
	$password = md5(strip_tags(addslashes($_POST["password"])));
	if(isset($_POST["btnlogin"])){
		if(empty($username)||empty($password)){
			echo "<script>alert('Field(s) tidak boleh kosong!')</script>";	
		}else{
			$sql_login = mysql_query("select * from tbl_admin where username = '".$username."' AND password = '".$password."'");
			$check = mysql_num_rows($sql_login);
			if($check > 0){
				$r_login = mysql_fetch_array($sql_login);
				session_register("authid");
				$_SESSION["authid"] = $r_login["username"];
				echo "<script>location.href='index.php'</script>";
			}else{
				echo "<script>alert('username atau password, SALAH!')</script>";	
			}
		}	
	} }
	?>
	</body>
	</html>