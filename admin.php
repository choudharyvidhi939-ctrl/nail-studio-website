<?php require 'config/db.php';
$rows=$pdo->query('SELECT a.appointment_id,u.full_name,s.name,t.name,a.appointment_date FROM appointments a JOIN users u ON a.user_id=u.user_id JOIN services s ON a.service_id=s.service_id JOIN stylists t ON a.stylist_id=t.stylist_id')->fetchAll();
echo '<table border=1>';foreach($rows as $r){echo '<tr><td>'.implode('</td><td>',$r).'</td></tr>'; }echo '</table>';?>
