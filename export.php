<?php

include_once 'connect.php';

require_once 'PhpXlsxGenerator.php';

$filename = "feedback-data_" . date('Y-m-d') . ".xlsx";

$exceldata[] = array('ID', 'FEEDBACK', 'MOBILE NUMBER', 'REASONS', 'RESPONSE TIME');


$query = $conn->query("SELECT * FROM response ORDER BY id ASC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){

        if($row['reasons'] === ""){
            $row['reasons'] = "Successfully Serviced";
        }

        $linedata = array($row['id'], $row['button_data'], $row['mobile_num'], $row['reasons'], $row['times']);
        $exceldata[] = $linedata;
    }
}

$xlsx = CodexWorld\PhpXlsxGenerator::fromArray($exceldata);
$xlsx->downloadAs($filename);
exit();


?>