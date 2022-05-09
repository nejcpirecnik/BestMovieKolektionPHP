<?php


include "../postgresqlDBConnect.php";
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db->prepare("SELECT * FROM users"); 
$stmt->execute();

$stmt = $db->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
    $emails[] = $row['email'];
}
$implodedEmails = implode("".PHP_EOL, $emails);
echo $implodedEmails;

$filename = 'Export.csv';

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename=' . $filename);
header("Content-Transfer-Encoding: UTF-8");

$head = fopen($filename, 'w');

$headers = $emails;

fclose($head);

$data = fopen($filename, 'a');
fputcsv($data, $headers);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($data, $row);
    }

fclose($data);

?>