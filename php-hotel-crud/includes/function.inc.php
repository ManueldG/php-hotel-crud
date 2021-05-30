<?php


// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}


function lista($conn){
    $sql = "SELECT `room_number` AS `stanza`, `floor` AS `piano`, `beds` AS `letti` FROM `stanze`";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $riga = <<<LNH
            <tr class="alert" role="alert">
            <td></td>
            <td>{$row['stanza']}</td>
            <td>{$row['piano']}</td>
            <td>{$row['letti']}</td>
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



