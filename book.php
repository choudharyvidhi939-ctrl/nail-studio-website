<?php require 'config/db.php';
$services=$pdo->query('SELECT * FROM services')->fetchAll();
$stylists=$pdo->query('SELECT * FROM stylists')->fetchAll();
if($_POST){$stmt=$pdo->prepare('INSERT INTO appointments(user_id,stylist_id,service_id,appointment_date,appointment_time)VALUES(?,?,?,?,?)');
$stmt->execute([1,$_POST['stylist_id'],$_POST['service_id'],$_POST['date'],$_POST['time']]);echo 'Booked!';}
?><form method=post>
<select name=service_id><?php foreach($services as $s)echo"<option value={$s['service_id']}>{$s['name']}</option>";?></select>
<select name=stylist_id><?php foreach($stylists as $t)echo"<option value={$t['stylist_id']}>{$t['name']}</option>";?></select>
<input type=date name=date><input type=time name=time><button>Book</button></form>