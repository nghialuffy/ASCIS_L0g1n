<?php
if (!defined('check_access')) 
{
        die("<font color='red' size='5'>(￣^￣)ゞ Hi Comrade, Something Wrong!</font>");
}
?>
<html>
	<title> L0g1n </title>
	<body>
		<h1><font color="purple">🔑 Login</font></h1>
<?php

if(empty($_SESSION["form_token"]))
{
	$gen_token=md5(uniqid(rand(), true));
	$_SESSION["form_token"] = $gen_token;
}

echo '<h3>';

if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["token"]))
{
	if($_SESSION["form_token"]===$_POST["token"])
	{
  		unset($_SESSION['form_token']);
  		$_SESSION["form_token"] = md5(uniqid(rand(), true));
  		if ($_POST["username"] === "admin" && md5($_POST["password"]) === "c3cef6586e2e5705d9ed18ba8f4346c0")
        {
  			$_SESSION['user'] = "admin";
  			print("Ok... Have a good day!");
  		}
  		else if ($_POST["username"] === "admin") 
  		{
  			print("Wrong Password, <font color='red'>(╯°-°)╯</font><font color='brown'>彡┻━┻</font>");
  		}
  		else
  		{
  			print("Wrong Username/Password<br><font color='blue'>‿︵‿︵‿︵‿</font><font color='red'>ヽ(°□° )ノ</font><font color='blue'>︵‿︵‿︵‿︵</font>");
  		}
	}
}
else 
{
	print("Hello, Login here <font color='green'>＼(＾▽＾)／</font>");
}

echo '</h3>';

?>

<?php
if(isset($_SESSION['user']) && $_SESSION['user']==="admin")
{
	print("Logged in");
}
else
{
$token = $_SESSION["form_token"];
$form = <<<EOF
		<form action="?page=login" method="POST">
			<br><strong>USERNAME</strong> <br><input type="text" name="username" /><br>
			<strong>PASSWORD</strong> <br><input type="password" name="password" /><br><br>
			<input type="hidden" name="token" value="$token" />
			<button type="submit" class="button1">Login</button>
		</form>
		Don't have an Account? Register <a href="?page=register">here</a>
EOF;
print($form);
}
?>

	</body>
</html>

