<?php


// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}


function lista($conn){
    //$sql = "SELECT `room_number` AS `stanza`, `floor` AS `piano`, `beds` AS `letti` FROM `stanze`";
    
    $sql="SELECT `room_number` AS `stanza`, `floor` AS `piano`, `beds` AS `letti`,`configurazioni`.`description` AS `descrizione` FROM `prenotazioni` INNER JOIN `stanze` on `stanza_id`= `stanze`.`id` INNER JOIN `configurazioni` on `configurazione_id`= `configurazioni`.`id`;";


    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $riga = <<<LNH
            <tr class="alert" role="alert">
            <td>{$row['stanza']}</td>
            <td>{$row['piano']}</td>
            <td>{$row['letti']}</td>
            <td><button onclick="openWin('{$row['descrizione']}')">Dettagli</button></td>
            </tr>
            LNH;


            echo $riga;
            
        }
    } elseif ($result) {
        echo "0 results";
    } else {
        echo "query error";
    }
}



