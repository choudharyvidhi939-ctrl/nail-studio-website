<?php session_start(); require 'config/db.php';
if($_POST){$stmt=$pdo->prepare('SELECT * FROM users WHERE email=?');$stmt->execute([$_POST['email']]);
$u=$stmt->fetch();if($u && password_verify($_POST['password'],$u['password_hash'])){$_SESSION['uid']=$u['user_id'];echo 'Login success';} else echo 'Fail';}
?><form method=post>
<input name=email type=email><input name=password type=password><button>Login</button></form>