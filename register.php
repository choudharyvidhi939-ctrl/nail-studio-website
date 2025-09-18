<?php require 'config/db.php';
if($_POST){$stmt=$pdo->prepare('INSERT INTO users(full_name,email,phone,password_hash)VALUES(?,?,?,?)');
$hash=password_hash($_POST['password'],PASSWORD_DEFAULT);
$stmt->execute([$_POST['full_name'],$_POST['email'],$_POST['phone'],$hash]);
echo 'Registered!';}
?><form method=post>
<input name=full_name placeholder='Full name'>
<input name=email type=email placeholder='Email'>
<input name=phone placeholder='Phone'>
<input name=password type=password placeholder='Password'>
<button>Register</button></form>