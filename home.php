<?php
if (!defined('check_access')) 
{
        die("<font color='red' size='5'>(￣^￣)ゞ Hi Comrade, Something Wrong!</font>");
}
?>
<html>
	<title> L0g1n </title>
	<body>
		<h1><font color="purple">🏠 Home</font></h1>
		<?php 
			include('secret.php');
			echo '<h3>';
			if(isset($_SESSION['user']) && $_SESSION['user']==="admin")
			{
				print("Oops, Admin? Here your flag...<br><font color='red'>( ノ-_-)ノ ( ノ-_-)ノ</font><font color='white'> $flag </font><font color='red'>ヾ(^-^ヽ)ヾ(^-^ヽ)</font>");
			}
			else
			{
				print("Hello, it looks like you haven't logged in yet, please <a href='?page=login'>L0g1n</a><br><br><font color='green'>!!(ﾒ￣ ￣)_θ☆°0°)/</font> <font color='blue'>(`⌒*)O-(`⌒´Q)</font> <font color='red'>(¬_¬'')ԅ(￣ε￣ԅ)</font>");
			}
			echo '</h3>';
		?>
	</body>
</html>