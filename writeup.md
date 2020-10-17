L0g1n - ASCIS

link bài: http://27.32.87.34.bc.googleusercontent.com

Gợi ý: Không có

Kiến thức:
- Path Traversal
- PHP Wrappers and Protocols
- Hash md5

Khi vào link này thì nó redirect sang trang này. Hừmmm

http://27.32.87.34.bc.googleusercontent.com/?page=home
[./img/home.png](./img/home.png)
Đầu tiên mình nghĩ tới việc dùng Path traversal.
No thing is here.
Thử một vài cái nữa vẫn không có gì xảy ra.

Thôi thì thử dùng PHP Wrappers and Protocols
cho page=php://filter/read/convert.base64-encode/resource=home
Ái chà chà.
Khác ngon. Giờ base64 decode rồi xem thôi.
Mình làm tương tự với các trang còn lại là: login, register, index

Ở đây mình biết còn một file secret.php. Nhưng hiện nó không vào được.
