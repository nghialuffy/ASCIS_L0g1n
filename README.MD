#L0g1n - ASCIS

link bài: http://27.32.87.34.bc.googleusercontent.com

Gợi ý: Không có

Kiến thức:
- Path Traversal
- PHP Wrappers and Protocols
- Hash md5

Khi vào link này thì nó redirect sang trang này. Hừmmm

http://27.32.87.34.bc.googleusercontent.com/?page=home

![](./img/home.png?raw=true)
Đầu tiên mình nghĩ tới việc dùng Path traversal.

![](./img/url_traversal.png?raw=true)

No thing is here.
Thử một vài cái nữa vẫn không có gì xảy ra.

Thôi thì thử dùng PHP Wrappers and Protocols
cho tham số page=php://filter/read/convert.base64-encode/resource=home

![](./img/base64_home.png?raw=true)

Ái chà chà. Tao có được mã base64 của trang home.php.

Giờ dùng base64 decode thôi.
![](./img/base64_home_terminal.png?raw=true)

Lúc vào web để xem thì ta biết được nó có 3 trang: home, login, register với trang index nữa.
Giờ tao lấy hết source code của nó.

Ta chú ý các đoạn source sau
-Trong file index:
```php
    if(isset($_GET["page"]) && !empty($_GET["page"]))
  {
    if( strpos(strtolower($_GET["page"]), "secret") !== false)
      {
        die("<font color='red' size='5'>(￣^￣)ゞ Hi Comrade, Something Wrong!</font>");
      }
    include($_GET["page"].".php");
  }
  else
  {
    header("Location: ?page=home");
  }
```
- Trong file home:
```php
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

```

-Trong file login.php

```php
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

```

Và cuối cùng là file register.php

```php
<?php
if (!defined('check_access')) 
{
        die("<font color='red' size='5'>(￣^￣)ゞ Hi Comrade, Something Wrong!</font>");
}
?>
<html>
	<title> L0g1n </title>
	<body>
		<h1><font color="purple">🔗 Register (Under maintenance)</font></h1>

<?php

echo '<h3>';

if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]))
{
	if($_POST["username"] === "admin") 
	{
		print("<font color='red'>(っ•﹏•)っ</font> User already exists ");
	}
	else
	{
		print("Our register service is under maintenance so please come back later.<br><font color='blue'>ヾ(⌐■_■)ノ♪</font>");
	}
}

echo '</h3>';

?>
<form action="?page=register" method="POST">
		<br><strong>USERNAME</strong><br> <input disabled type="text" title="Something very wrong!!!" pattern="[a-z0-9]{4,10}" name="username"/><br>
		<strong>PASSWORD</strong><br> <input disabled type="password" title="Something very wrong!!!" pattern="[a-h0-9]{4,7}" name="password" /><br>
		<strong>ADDRESS</strong><br> <input disabled type="address" name="address"> (Optional)<br><br>
		<button type="submit" class="button1">Register</button>
		</form>
	</body>
</html>

```
Đầu tiên là file index.php
![](./img/index_php.png?raw=true)
Có lẽ chỉ cần bypass qua được cái strpos và strtolower là có thể lấy được source của file secret.php (nơi chứa flag)
Nhưng rất tiếc, sau một đống thời gian tìm và thử => No hope :(

Trong file home.php
![](./img/home_php.png?raw=true)
Trong này chả có gì nhiều. Ta chỉ biết được là đăng nhập bằng admin được thì có flag thôi.

Tiếp theo là trong file register.php
![](./img/register_php.png?raw=true)
Trong này ta chỉ nên chú ý một đoạn là đoạn nhập form
Username và password được pattern trong khoảng từ a-h và từ 0-9 với độ dài trong khoảng 4-7.
Không biết ban tổ chức có lừa mình không. Nhưng mong là password của admin cũng thỏa mãn điều kiện này để bruce force.
  
Tiếp theo là trong file login.php
![](./img/login_php.png?raw=true)
Úi chà, có được password sau khi md5 là 'c3cef6586e2e5705d9ed18ba8f4346c0' luôn. Giờ decrypto cái password chắc ra được mật khẩu.
Mình code một đoạn để "chó ngáp phải ruồi" thôi. Chạy mà lòng mong BTC không lừa mình.

```python
import hashlib 
import secrets
res = "c3cef6586e2e5705d9ed18ba8f4346c0"
while True:
    password = ''.join(secrets.choice('abcdefgh0123456789') for i in range(7))
    result = hashlib.md5(bytes(password,encoding='utf-8'))
    if(res == result.hexdigest()):
        print(password + ": True")
        break
    else:
        print(password + ": False")
```

Chạy một hồi thì ra được password là 143b4b3



Vào trang login submit với username = admin và password = 143b4b3 thôiiii.
![](./img/logged_in.png?raw=true)

Vào lại home:

![](./img/flag.png?raw=true)

Flag:  ASCIS{__Hav3_Y0u_Heard_Ab0ut__HTML_PATT3rN?_} 

Khá toang. Anyway, THIS IS THE ENDGAME!!!!
